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
            /*
            string line;
            string json = string.Empty;
            while ( (line = Console.ReadLine()) != null) {
                json += line;
            }
            JavaScriptSerializer JSONSerializer = new JavaScriptSerializer();
            Input input = JSONSerializer.Deserialize<Input>(json);
            */
            /* Pass the JSON input to Model */

            Input input = new Input() {
                query = "hehe",
                setting = new Setting() {
                    allowedFileExternals = new List<string>() { ".txt" },
                    path = "E:\\Projects\\Software\\Windows\\Visual Studio 2013\\CeplokFC\\",
                    searchMode = Setting.SearchMode.BFS
                }
            };
            Console.WriteLine("HA");
            Output output = Crawler.Run(input.setting.path, input.query, input.setting);
            foreach (Docs doc in output.docs) {
                Console.WriteLine(doc.title);
                Console.WriteLine(doc.path);
            }
            /* Return JSON to Ruby Controller */
            //Console.WriteLine(json);
            //Console.Write(input.Query);
            while (true) ;
        }
    }
}
