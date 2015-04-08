/*
 * @Student Name: Liang Yulu
 * @Login Name: yulul
 * @Student ID: 103242
 * @Last Modified: 25/09/2011
 * 
 * @Describe: a index class is used to return a array. 
 */
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace yululAssignment1
{
    class TVProgramIndexer
    {
        private TVProgram[] programList;
        private int arrsize { get; set; }

        public TVProgramIndexer(int index)
        {
            arrsize = index;
            programList = new TVProgram[index];
        }

        public TVProgram this[int i]
        {
            get
            {
                return programList[i];
            }
            set
            {
                programList[i] = value;
            }
        }

        public int Length()
        {
            return arrsize;
        }
    }
}
