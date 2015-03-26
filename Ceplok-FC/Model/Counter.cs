using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Ceplok_FC.Model {
    class Counter : Output {
        public Counter() {
            OutputType = Type.Counter;
        }
        public int Checked { get; set; }
        public int Total { get; set; }
        public static DateTime LastPrint = DateTime.Now;
        public const double Threshold = 250;
    }
}
