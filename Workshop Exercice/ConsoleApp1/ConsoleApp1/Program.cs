using System.Net;
using System.Net.Http;
using System.Net.Sockets;
using System.Threading.Tasks;
using System;

namespace MyWebServer
{
    using System;

    public class Program
    {
        public static async Task Main()
        {

            // http://localhost:9090

            var address = IPAddress.Parse("127.0.0.1"); // localhost => 127.0.0.1
            var port = 9090;

            var serverListener = new TcpListener(address, port);

            serverListener.Start();

            Console.WriteLine($"Server started on port {port}...");
            Console.WriteLine($"Listening for requests...");

            var connection =  await serverListener.AcceptTcpClientAsync();

        }
    }
}
