using System;
using System.IO;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Text.RegularExpressions;
using System.Threading.Tasks;

namespace Ceplok_FC.Model {
    
    class Crawler {
        private const int PAD = 8;
        private int count = 0;
        private int total = 0;
        public void Run(string path, string pattern, Setting setting) {
            count = 0;
            switch (setting.Mode) {
                case Setting.SearchMode.BFS:
                    total = CountDir(path);
                    DoBFS(path, pattern, setting);
                    break;
                case Setting.SearchMode.DFS:
                    total = CountDir(path);
                    DoDFS(path, pattern, setting);
                    break;
                default:
                    break;
            }
            /* After we done, print the last to make sure our client receive last checked file notification*/
            Counter counter = new Counter();
            counter.Checked = count;
            counter.Total = total;
            counter.Write();

        }
        public int CountDir(string path) {
            var nodeQueue = new Queue<string>();
            int ret = 0;
            nodeQueue.Enqueue(path);
            while (nodeQueue.Count != 0)
            {
                var curPath = nodeQueue.Dequeue();
                try {
                    ret += Directory.GetFiles(curPath).Length;
                }
                catch (Exception) { }
                try
                {
                    var childPaths = Directory.GetDirectories(curPath);
                    foreach (string childPath in childPaths)
                    {
                        nodeQueue.Enqueue(childPath);
                    }
                }
                catch (Exception) { }
            }
            return ret;
        }
        public void DoBFS(string path, string pattern, Setting setting) {
            var nodeQueue = new Queue<string>();

            nodeQueue.Enqueue(path);
            while (nodeQueue.Count != 0) {
                var curPath = nodeQueue.Dequeue();
                FindTextInFiles(curPath, pattern, setting);
                try {
                    var childPaths = Directory.GetDirectories(curPath);
                    foreach (string childPath in childPaths) {
                        nodeQueue.Enqueue(childPath);
                    }
                }
                catch (Exception) { }
            }
        }

        public void DoDFS(string path, string pattern, Setting setting) {
            FindTextInFiles(path, pattern, setting);
            try {
                var childPaths = Directory.GetDirectories(path);
                foreach (var childPath in childPaths)
                    DoDFS(childPath, pattern, setting);
            }
            catch (Exception) { }
        }

        private void FindTextInFiles(string path, string pattern, Setting setting) {
            try {
                var filePaths = Directory.GetFiles(path);
                foreach (var filePath in filePaths) {
                    foreach (var ext in setting.Exts) {
                        if (filePath.EndsWith(ext)) {
                            var texts = ReadFromFile(filePath, ext);
                            ProcessTexts(texts, pattern, filePath);
                            break;
                        }
                    }
                    SendCounter();
                }
            }
            catch (Exception) {
            }
        }

        private void SendCounter() {
            ++count;
            if ((DateTime.Now - Counter.LastPrint).TotalMilliseconds >= Counter.Threshold) {
                Counter counter = new Counter();
                counter.Checked = count;
                counter.Total = total;
                counter.Write();
                Counter.LastPrint = DateTime.Now;
            }
        }

        private static string ReadFromFile(string filePath, string ext) {
            switch (ext) {
                case ".docx":
                    return Ceplok_FC.Utility.DocxReader.GetTextFromDocx(filePath);
                case ".pptx":
                    return Ceplok_FC.Utility.PptxReader.GetSlideText(filePath);
                case ".xlsx":
                    return Ceplok_FC.Utility.XlsxReader.ReadExcelFileSAX(filePath);
                default:
                    return File.ReadAllText(filePath);
            }
        }
        
        private static void ProcessTexts(string text, string pattern, string filePath) {
            var splitPattern = @"\b(\w+)\b";
            string[] words = Regex.Split(text, splitPattern);
            int widx = 0;
            while (widx < words.Length && words[widx].IndexOf(pattern) == -1)
                ++widx;
            if (widx < words.Length) {
                string newText = String.Empty;
                for (int i = Math.Max(widx - PAD, 0); i < Math.Min(widx + PAD, words.Length); ++i) {
                    newText += words[i];
                }

                Docs doc = new Docs();
                doc.Path = filePath;
                doc.Preview = newText;
                doc.Write();
            }
        }
    }
}
