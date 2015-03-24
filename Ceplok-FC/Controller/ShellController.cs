using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Web.Script.Serialization;

using Ceplok_FC.Model;

namespace Ceplok_FC {
    class ShellController {
        static void Main(string[] args) {
            /* Get JSON input from CLI */
            string line;
            string json = string.Empty;
            while ( (line = Console.ReadLine()) != null) {
                json += line;
            }
            JavaScriptSerializer JSONSerializer = new JavaScriptSerializer();
            Input input = JSONSerializer.Deserialize<Input>(json);
            Crawler.Run(input.Setting.Path, input.Query, input.Setting);
        }
    }
}
