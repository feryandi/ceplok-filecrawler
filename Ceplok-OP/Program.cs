﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Ceplok_OP {
    class Program {
        static void Main(string[] args) {
            string path = Console.ReadLine();
            System.Diagnostics.Process.Start(path);
            Console.WriteLine(path);

        }
    }
}
