using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Ceplok_FC.Model {
    class Input {
        public string query;
        public Setting setting;
        public string Query {
            get { return query; }
        }
        public Setting Setting {
            get { return setting; }
        }
    }
}
