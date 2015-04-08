/*
 * @Student Name: Liang Yulu
 * @Login Name: yulul
 * @Student ID: 103242
 * @Last Modified: 25/09/2011
 * 
 * @Describe: a class extended TVProgram class is used to return a string. 
 */
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace yululAssignment1
{
    class ToRecordProgram : TVProgram
    {
        //Empty consturctor used in programGuide class.
        public ToRecordProgram()
        {
        }

        public ToRecordProgram(string title, string episodeTitle, string description, BroadcastStation Channel, DateTime StartTime, int duration)
        {
            this.Title = title;
            this.EpisodeTitle = episodeTitle;
            this.Description = description;
            this.Channel = Channel;
            this.StartTime = StartTime;
            this.Duration = duration;
        }

        public override string ToString()
        {
            string temp = "";

            if ((Duration / 60) == 1)
                temp = (Duration / 60) + " hour ";
            else if ((Duration / 60) > 1)
                temp = (Duration / 60) + " hours ";

            temp += (Duration % 60) + " minutes";

            if (EpisodeTitle.ToString().Length == 0 && Description.ToString().Length != 0)
                return Title + " : " + Description + "\r\n" + Channel.ToString() + " " + StartTime.Day + "/" + StartTime.Month + " " + StartTime.ToString("t") + " " + temp;
            else if (Description.ToString().Length == 0 && EpisodeTitle.ToString().Length != 0)
                return Title + " : " + EpisodeTitle + "\r\n" + Channel.ToString() + " " + StartTime.Day + "/" + StartTime.Month + " " + StartTime.ToString("t") + " " + temp;
            else if (EpisodeTitle.ToString().Length == 0 && Description.ToString().Length == 0)
                return Title + "\r\n" + Channel.ToString() + " " + StartTime.Day + "/" + StartTime.Month + " " + StartTime.ToString("t") + " " + temp;
            else
                return Title + " : " + EpisodeTitle + " : " + Description + "\r\n" + Channel.ToString() + " " + StartTime.Day + "/" + StartTime.Month + " " + StartTime.ToString("t") + " " + temp;
        }

    }
}
