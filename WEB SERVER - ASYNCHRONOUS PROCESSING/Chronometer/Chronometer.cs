using System;
using System.Collections.Generic;
using System.Diagnostics;

namespace ConsoleApp1
{
    public class Chronometer
    {
        private Stopwatch chronometer;

        public string GetTime => chronometer.Elapsed.ToString();
        public List<string> Laps { get; private set; }

        public Chronometer()
        {
            chronometer = new Stopwatch();
            Laps = new List<string>();
        }
        public void Start()
        {
            chronometer.Start();
        }

        public void Stop()
        {
            chronometer.Stop();
            var stopTime = chronometer.ElapsedMilliseconds.ToString();
            Console.WriteLine(stopTime);
        }

        public string Lap()
        {
            var timeSpan = chronometer.Elapsed;
            Laps.Add(timeSpan.ToString());
            return timeSpan.ToString();
        }

        public void Reset()
        {
            chronometer.Restart();
            chronometer.Stop();
            Laps = new List<string>();
        }
    }
}
