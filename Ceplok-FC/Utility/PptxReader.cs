using DocumentFormat.OpenXml;
using DocumentFormat.OpenXml.Packaging;
using DocumentFormat.OpenXml.Presentation;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using A = DocumentFormat.OpenXml.Drawing;

namespace Ceplok_FC.Utility {
    static class PptxReader {
        private static int CountSlides(string presentationFile) {
            // Open the presentation as read-only.
            using (PresentationDocument presentationDocument = PresentationDocument.Open(presentationFile, false)) {
                // Pass the presentation to the next CountSlides method
                // and return the slide count.
                return CountSlides(presentationDocument);
            }
        }

        // Count the slides in the presentation.
        private static int CountSlides(PresentationDocument presentationDocument) {
            // Check for a null document object.
            if (presentationDocument == null) {
                throw new ArgumentNullException("presentationDocument");
            }

            int slidesCount = 0;

            // Get the presentation part of document.
            PresentationPart presentationPart = presentationDocument.PresentationPart;
            // Get the slide count from the SlideParts.
            if (presentationPart != null) {
                slidesCount = presentationPart.SlideParts.Count();
            }
            // Return the slide count to the previous method.
            return slidesCount;
        }

        public static string GetSlideText(string filePath) {
            string sldText = String.Empty;
            int numberOfSlides = CountSlides(filePath);
            using (PresentationDocument ppt = PresentationDocument.Open(filePath, false)) {
                // Build a StringBuilder object.
                StringBuilder paragraphText = new StringBuilder();
                for (int i = 0; i < numberOfSlides; ++i) {
                    // Get the relationship ID of the first slide.
                    PresentationPart part = ppt.PresentationPart;
                    OpenXmlElementList slideIds = part.Presentation.SlideIdList.ChildElements;

                    string relId = (slideIds[i] as SlideId).RelationshipId;

                    // Get the slide part from the relationship ID.
                    SlidePart slide = (SlidePart)part.GetPartById(relId);

                    // Get the inner text of the slide:
                    IEnumerable<A.Text> texts = slide.Slide.Descendants<A.Text>();
                    foreach (A.Text text in texts) {
                        paragraphText.Append(text.Text);
                    }
                }
                sldText = paragraphText.ToString();
            }
            return sldText;
        }
    }
}
