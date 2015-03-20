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
        public SearchMode searchMode;
        public List<string> allowedFileExternals;
        public List<string> Exts { 
            get { return allowedFileExternals; }
        }
    }
}
