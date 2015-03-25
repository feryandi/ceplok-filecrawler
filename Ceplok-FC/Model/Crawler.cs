using System;
using System.IO;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Text.RegularExpressions;
using System.Threading.Tasks;
using System.Web.Script.Serialization;
using Microsoft.Office.Interop;

namespace Ceplok_FC.Model {
    
    class Crawler {
        private const int pad = 3;
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
                catch (Exception ex) { }
                try
                {
                    var childPaths = Directory.GetDirectories(curPath);
                    foreach (string childPath in childPaths)
                    {
                        nodeQueue.Enqueue(childPath);
                    }
                }
                catch (Exception ex) { }
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
                catch (Exception ex) { }
            }
        }

        public void DoDFS(string path, string pattern, Setting setting) {
            FindTextInFiles(path, pattern, setting);
            try {
                var childPaths = Directory.GetDirectories(path);
                foreach (var childPath in childPaths)
                    DoDFS(childPath, pattern, setting);
            }
            catch (Exception ex) { }
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
            catch (Exception ex) {
            }
        }

        private void SendCounter() {
            ++count;
            Counter counter = new Counter();
            counter.Checked = count;
            counter.Total = total;
            counter.Write();
        }

        private static string ReadFromFile(string filePath, string ext) {
            switch (ext) {
                case ".doc":
                //case ".docx":
                    Microsoft.Office.Interop.Word.Application application = new Microsoft.Office.Interop.Word.Application();
                    Microsoft.Office.Interop.Word.Document doc = application.Documents.Open(filePath);
                    var texts = String.Empty;
                    for (var i = 0; i < doc.Words.Count; ++i) {
                        texts += doc.Words[i];
                    }
                    application.Quit();
                    return texts;
                default:
                    return File.ReadAllText(filePath);
            }
        }

        private static void ProcessTexts(string text, string pattern, string filePath) {
            var idx = text.IndexOf(pattern);
            if (idx != -1) {
                var splitPattern = @"\b(\w+)\b";
                string[] words = Regex.Split(text, splitPattern);
                string newText = String.Empty;
                int widx = 0;
                while (widx < words.Length && words[widx].IndexOf(pattern) == -1)
                    ++widx;
                for (int i = Math.Max(widx - pad, 0); i < Math.Min(widx + pad, words.Length); ++i)
                    newText += words[i];

                Docs doc = new Docs();
                doc.Path = filePath;
                doc.Preview = newText;
                doc.Write();
            }
        }
    }
}
