using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Web.Script.Serialization;

namespace Ceplok_FC.Model {
    abstract class Output {
        public enum Type {
            Counter,
            Docs
        }
        public Type OutputType { get; set; }
        public void Write() {
            JavaScriptSerializer JSONSerializer = new JavaScriptSerializer();
            Console.WriteLine(JSONSerializer.Serialize(this));
            System.IO.File.AppendAllText(@"E:\log.txt", JSONSerializer.Serialize(this) + "\n");
        }
    }
}
