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
            List<Docs> ret;
            switch (setting.searchMode) {
                case Setting.SearchMode.BFS:
                    ret = DoBFS(path, pattern, setting);
                    break;
                case Setting.SearchMode.DFS:
                    ret = DoDFS(path, pattern, setting);
                    break;
                default:
                    ret = new List<Docs>();
                    break;
            }
            return new Output(ret);

        }
        public static List<Docs> DoBFS(string path, string pattern, Setting setting) {
            var ret = new List<Docs>();
            var nodeQueue = new Queue<string>();

            nodeQueue.Enqueue(path);
            while (nodeQueue.Count != 0) {
                var curPath = nodeQueue.Dequeue();
                Console.WriteLine(curPath);
                ret.AddRange(FindTextInFile(curPath, pattern, setting));

                var childPaths = Directory.GetDirectories(curPath);
                foreach (string childPath in childPaths)
                    nodeQueue.Enqueue(childPath);
            }
            Console.WriteLine("Pake BFS");
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
            foreach (var fileExts in setting.Exts) {
                foreach (var filePath in filePaths) {
                    string texts = File.ReadAllText(filePath);
                    if (texts.IndexOf(pattern) != -1)
                        ret.Add(new Docs(filePath, texts));
 
                }
            }
            return ret;
        }
    }
}
