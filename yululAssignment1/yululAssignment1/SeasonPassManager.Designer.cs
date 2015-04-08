namespace yululAssignment1
{
    partial class SeasonPassManager
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
                  this.programList = new System.Windows.Forms.ListBox();
                  this.upButton = new System.Windows.Forms.Button();
                  this.downButton = new System.Windows.Forms.Button();
                  this.closeButton = new System.Windows.Forms.Button();
                  this.deleteButton = new System.Windows.Forms.Button();
                  this.SuspendLayout();
                  // 
                  // programList
                  // 
                  this.programList.FormattingEnabled = true;
                  this.programList.ItemHeight = 12;
                  this.programList.Location = new System.Drawing.Point(13, 12);
                  this.programList.Name = "programList";
                  this.programList.Size = new System.Drawing.Size(138, 136);
                  this.programList.TabIndex = 0;
                  // 
                  // upButton
                  // 
                  this.upButton.Location = new System.Drawing.Point(157, 12);
                  this.upButton.Name = "upButton";
                  this.upButton.Size = new System.Drawing.Size(75, 21);
                  this.upButton.TabIndex = 1;
                  this.upButton.Text = "Up";
                  this.upButton.UseVisualStyleBackColor = true;
                  this.upButton.Click += new System.EventHandler(this.up_Click);
                  // 
                  // downButton
                  // 
                  this.downButton.Location = new System.Drawing.Point(157, 39);
                  this.downButton.Name = "downButton";
                  this.downButton.Size = new System.Drawing.Size(75, 21);
                  this.downButton.TabIndex = 2;
                  this.downButton.Text = "Down";
                  this.downButton.UseVisualStyleBackColor = true;
                  this.downButton.Click += new System.EventHandler(this.down_Click);
                  // 
                  // closeButton
                  // 
                  this.closeButton.Location = new System.Drawing.Point(157, 210);
                  this.closeButton.Name = "closeButton";
                  this.closeButton.Size = new System.Drawing.Size(75, 21);
                  this.closeButton.TabIndex = 3;
                  this.closeButton.Text = "Close";
                  this.closeButton.UseVisualStyleBackColor = true;
                  this.closeButton.Click += new System.EventHandler(this.closeClick);
                  // 
                  // deleteButton
                  // 
                  this.deleteButton.Location = new System.Drawing.Point(157, 126);
                  this.deleteButton.Name = "deleteButton";
                  this.deleteButton.Size = new System.Drawing.Size(75, 21);
                  this.deleteButton.TabIndex = 4;
                  this.deleteButton.Text = "Delete";
                  this.deleteButton.UseVisualStyleBackColor = true;
                  this.deleteButton.Click += new System.EventHandler(this.deleteProgram);
                  // 
                  // SeasonPassManager
                  // 
                  this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 12F);
                  this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
                  this.ClientSize = new System.Drawing.Size(247, 242);
                  this.Controls.Add(this.deleteButton);
                  this.Controls.Add(this.closeButton);
                  this.Controls.Add(this.downButton);
                  this.Controls.Add(this.upButton);
                  this.Controls.Add(this.programList);
                  this.Name = "SeasonPassManager";
                  this.Text = "SeasonPassManager";
                  this.Load += new System.EventHandler(this.SeasonPassManager_Load);
                  this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.ListBox programList;
        private System.Windows.Forms.Button upButton;
        private System.Windows.Forms.Button downButton;
        private System.Windows.Forms.Button closeButton;
        private System.Windows.Forms.Button deleteButton;
    }
}