using System;
using System.IO;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Ceplok_FC.Model {
    
    static class Crawler {
        public static Output Run(string path, string pattern, Setting setting) {
            List<Docs> docs;
            switch (setting.Mode) {
                case Setting.SearchMode.BFS:
                    docs = DoBFS(path, pattern, setting);
                    break;
                case Setting.SearchMode.DFS:
                    docs = DoDFS(path, pattern, setting);
                    break;
                default:
                    docs = new List<Docs>();
                    break;
            }
            Output ret = new Output();
            ret.Docs = docs;
            return ret;

        }
        public static List<Docs> DoBFS(string path, string pattern, Setting setting) {
            var ret = new List<Docs>();
            var nodeQueue = new Queue<string>();

            nodeQueue.Enqueue(path);
            while (nodeQueue.Count != 0) {
                var curPath = nodeQueue.Dequeue();
                ret.AddRange(FindTextInFile(curPath, pattern, setting));
                var childPaths = Directory.GetDirectories(curPath);
                foreach (string childPath in childPaths) {
                    nodeQueue.Enqueue(childPath);
                }
            }
            return ret;
        }

        public static List<Docs> DoDFS(string path, string pattern, Setting setting) {
            var ret = new List<Docs>();

            ret.AddRange(FindTextInFile(path, pattern, setting));

            var childPaths = Directory.GetDirectories(path);
            foreach (var childPath in childPaths)
                ret.AddRange(DoDFS(childPath, pattern, setting));
            Console.WriteLine("Pake DFS");
            return ret;
        }

        private static List<Docs> FindTextInFile(string path, string pattern, Setting setting) {
            var ret = new List<Docs>();
            var filePaths = Directory.GetFiles(path);
            foreach (var filePath in filePaths) {
                bool valid = false;
                foreach (var ext in setting.Exts) {
                    if (filePath.EndsWith(ext))
                        valid = true;
                }
                if (valid) {
                    var texts = File.ReadAllLines(filePath);
                    foreach (var text in texts) {
                        if (text.IndexOf(pattern) != -1) {
                            Docs doc = new Docs();
                            doc.Path = filePath;
                            doc.Title = text;
                            ret.Add(doc);
                            break;
                        }
                    }
                }
            }
            return ret;
        }
    }
}
