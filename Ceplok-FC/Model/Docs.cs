using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Runtime.Serialization;

namespace Ceplok_FC.Model {
    class Docs : Output {
        public Docs() {
            OutputType = Type.Docs;
        }
        public string Path { get; set; }
        public string Preview { get; set; }
    }
}
