﻿using System;
using System.IO;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Text.RegularExpressions;
using System.Threading.Tasks;
using System.Web.Script.Serialization;

namespace Ceplok_FC.Model {
    
    class Crawler {
        private const int pad = 3;
        private int count = 0;
        public void Run(string path, string pattern, Setting setting) {
            count = 0;
            switch (setting.Mode) {
                case Setting.SearchMode.BFS:
                    DoBFS(path, pattern, setting);
                    break;
                case Setting.SearchMode.DFS:
                    DoDFS(path, pattern, setting);
                    break;
                default:
                    break;
            }

        }
        public void DoBFS(string path, string pattern, Setting setting) {
            var nodeQueue = new Queue<string>();

            nodeQueue.Enqueue(path);
            while (nodeQueue.Count != 0) {
                var curPath = nodeQueue.Dequeue();
                FindTextInFile(curPath, pattern, setting);
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
            FindTextInFile(path, pattern, setting);
            try {
                var childPaths = Directory.GetDirectories(path);
                foreach (var childPath in childPaths)
                    DoDFS(childPath, pattern, setting);
            }
            catch (Exception ex) { }
        }

        private void FindTextInFile(string path, string pattern, Setting setting) {
            try {
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
                                break;
                            }
                        }
                    }
                    ++count;
                    Counter counter = new Counter();
                    counter.Checked = count;
                    counter.Total = 1000;
                    counter.Write();
                }
            }
            catch (Exception ex) { }
        }
    }
}
