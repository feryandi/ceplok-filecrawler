using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Ceplok_FC.Model {
    class Output {
        public Output(List<Docs> docs) {
            this.docs = docs;
        }
        public List<Docs> docs;
        public Docs Docs {
            get { return Docs; }
        }
    }
}
