/*
 * @Student Name: Liang Yulu
 * @Login Name: yulul
 * @Student ID: 103242
 * @Last Modified: 25/09/2011
 * 
 * @Describe: a class is used to get and set Priority.
 */
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace yululAssignment1
{
    class SeasonProgram : TVProgram
    {
        //a Priority field.
        public int Priority { get; set; }

        //empty constructor used in programGuide.
        public SeasonProgram() { }

        public SeasonProgram(string title, string episodeTitle, string description, BroadcastStation Channel, DateTime StartTime, int duration)
        {
            this.Title = title;
        }

        public SeasonProgram(string title, string description, BroadcastStation Channel, DateTime StartTime, int duration)
        {
            this.Title = title;
        }

        public SeasonProgram(string title, BroadcastStation Channel, DateTime StartTime, int duration)
        {
            this.Title = title;
        }

        public override string ToString()
        {
            return Title;
        }
    }
}
