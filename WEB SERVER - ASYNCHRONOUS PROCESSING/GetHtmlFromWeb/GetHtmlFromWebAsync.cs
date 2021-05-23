using System;
using System.Collections.Generic;
using System.IO;
using System.Net.Http;
using System.Threading.Tasks;

namespace ConsoleApp2
{
    class GetHtmlFromWebAsync
    {
        public static async Task Main(string[] args)
        {
            var downloads = new List<Task<string>>
            {
                DownloadWebSiteContent("https://softuni.bg"),
                DownloadWebSiteContent("https://creative.softuni.bg"),
                DownloadWebSiteContent("https://digital.softuni.bg")
            };
            Console.WriteLine("Fetching websites... Please wait...");

            var responses = await Task.WhenAll(downloads);

            var fileTasks = new List<Task>()
            {
                File.WriteAllTextAsync("softuni.txt", responses[0]),
                File.WriteAllTextAsync("creative.txt", responses[0]),
                File.WriteAllTextAsync("digital.txt", responses[0]),
            };

            await Task.WhenAll(fileTasks);
        }

        private static async Task<string> DownloadWebSiteContent(string url)
        {
            var httpClient = new HttpClient();

            var response = await httpClient.GetAsync(url);
             
            var html = await response.Content.ReadAsStringAsync();

            return html;
        }
    }
}
