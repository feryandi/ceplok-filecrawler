using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Runtime.Serialization;

namespace Ceplok_FC.Model {
    struct Docs {
        public Docs(string path, string title) {
            this.path = path;
            this.title = title;
        }
        public string path;
        public string title;
    }
}
