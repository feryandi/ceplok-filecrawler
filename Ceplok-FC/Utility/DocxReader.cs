using DocumentFormat.OpenXml.Packaging;
using DocumentFormat.OpenXml.Wordprocessing;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Ceplok_FC.Utility {
    class DocxReader {
        public static string GetTextFromDocx(string filePath) {
            string text = String.Empty;
            OpenSettings os = new OpenSettings();
            WordprocessingDocument doc = WordprocessingDocument.Open(filePath, false, os);
            Body body = doc.MainDocumentPart.Document.Body;

            foreach (DocumentFormat.OpenXml.OpenXmlElement c in body.ChildElements)
                text += c.InnerText + "\n";
            doc.Close();
            return text;
        }
    }
}
