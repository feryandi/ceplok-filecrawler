using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.Text;
using System.Threading.Tasks;

namespace Ceplok_FC.Model {
    class Setting {
        public enum SearchMode {
            BFS,
            DFS
        }
        public SearchMode Mode { get; set; }
        public List<string> Exts { get; set; }
        public string Path { get; set; }
    }
}
