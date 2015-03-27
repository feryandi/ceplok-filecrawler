using DocumentFormat.OpenXml;
using DocumentFormat.OpenXml.Packaging;
using DocumentFormat.OpenXml.Spreadsheet;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Ceplok_FC.Utility {
    class XlsxReader {
        public static string ReadExcelFileSAX(string filePath) {
            using (SpreadsheetDocument spreadsheetDocument = SpreadsheetDocument.Open(filePath, false)) {
                WorkbookPart workbookPart = spreadsheetDocument.WorkbookPart;
                WorksheetPart worksheetPart = workbookPart.WorksheetParts.First();

                OpenXmlReader reader = OpenXmlReader.Create(worksheetPart);
                string text = String.Empty;
                while (reader.Read()) {
                    if (reader.ElementType == typeof(CellValue)) {
                        text += reader.GetText();
                    }
                }
                return text;
            }
        }
    }
}
