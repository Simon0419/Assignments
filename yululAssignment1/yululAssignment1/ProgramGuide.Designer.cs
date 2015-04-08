namespace yululAssignment1
{
          partial class ProgramGuide
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
                              this.dateTimePicker = new System.Windows.Forms.DateTimePicker();
                              this.channelList = new System.Windows.Forms.ListBox();
                              this.programView = new System.Windows.Forms.ListBox();
                              this.descriptionView = new System.Windows.Forms.TextBox();
                              this.recordButton = new System.Windows.Forms.Button();
                              this.seasonButton = new System.Windows.Forms.Button();
                              this.closeButton = new System.Windows.Forms.Button();
                              this.SuspendLayout();
                              // 
                              // dateTimePicker
                              // 
                              this.dateTimePicker.Location = new System.Drawing.Point(13, 13);
                              this.dateTimePicker.MaxDate = new System.DateTime(2010, 7, 23, 0, 0, 0, 0);
                              this.dateTimePicker.MinDate = new System.DateTime(2010, 7, 21, 0, 0, 0, 0);
                              this.dateTimePicker.Name = "dateTimePicker";
                              this.dateTimePicker.Size = new System.Drawing.Size(200, 21);
                              this.dateTimePicker.TabIndex = 0;
                              this.dateTimePicker.Value = new System.DateTime(2010, 7, 21, 0, 0, 0, 0);
                              this.dateTimePicker.ValueChanged += new System.EventHandler(this.displayPrograms);
                              // 
                              // channelList
                              // 
                              this.channelList.FormattingEnabled = true;
                              this.channelList.ItemHeight = 12;
                              this.channelList.Location = new System.Drawing.Point(13, 41);
                              this.channelList.Name = "channelList";
                              this.channelList.Size = new System.Drawing.Size(59, 100);
                              this.channelList.TabIndex = 1;
                              this.channelList.SelectedValueChanged += new System.EventHandler(this.displayPrograms);
                              // 
                              // programView
                              // 
                              this.programView.FormattingEnabled = true;
                              this.programView.ItemHeight = 12;
                              this.programView.Location = new System.Drawing.Point(79, 41);
                              this.programView.Name = "programView";
                              this.programView.Size = new System.Drawing.Size(326, 100);
                              this.programView.TabIndex = 2;
                              this.programView.SelectedIndexChanged += new System.EventHandler(this.displayDescription);
                              // 
                              // descriptionView
                              // 
                              this.descriptionView.Location = new System.Drawing.Point(13, 147);
                              this.descriptionView.Multiline = true;
                              this.descriptionView.Name = "descriptionView";
                              this.descriptionView.Size = new System.Drawing.Size(392, 57);
                              this.descriptionView.TabIndex = 3;
                              // 
                              // recordButton
                              // 
                              this.recordButton.Location = new System.Drawing.Point(13, 211);
                              this.recordButton.Name = "recordButton";
                              this.recordButton.Size = new System.Drawing.Size(75, 23);
                              this.recordButton.TabIndex = 4;
                              this.recordButton.Text = "Record";
                              this.recordButton.UseVisualStyleBackColor = true;
                              this.recordButton.Click += new System.EventHandler(this.recordProgram);
                              // 
                              // seasonButton
                              // 
                              this.seasonButton.Location = new System.Drawing.Point(161, 211);
                              this.seasonButton.Name = "seasonButton";
                              this.seasonButton.Size = new System.Drawing.Size(75, 23);
                              this.seasonButton.TabIndex = 5;
                              this.seasonButton.Text = "Season Pass";
                              this.seasonButton.UseVisualStyleBackColor = true;
                              this.seasonButton.Click += new System.EventHandler(this.createSeasonPass);
                              // 
                              // closeButton
                              // 
                              this.closeButton.Location = new System.Drawing.Point(329, 211);
                              this.closeButton.Name = "closeButton";
                              this.closeButton.Size = new System.Drawing.Size(75, 23);
                              this.closeButton.TabIndex = 6;
                              this.closeButton.Text = "Close";
                              this.closeButton.UseVisualStyleBackColor = true;
                              this.closeButton.Click += new System.EventHandler(this.closeClick);
                              // 
                              // ProgramGuide
                              // 
                              this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 12F);
                              this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
                              this.ClientSize = new System.Drawing.Size(417, 262);
                              this.Controls.Add(this.closeButton);
                              this.Controls.Add(this.seasonButton);
                              this.Controls.Add(this.recordButton);
                              this.Controls.Add(this.descriptionView);
                              this.Controls.Add(this.programView);
                              this.Controls.Add(this.channelList);
                              this.Controls.Add(this.dateTimePicker);
                              this.Name = "ProgramGuide";
                              this.Text = "TV Guide";
                              this.Load += new System.EventHandler(this.ProgramGuide_Load);
                              this.ResumeLayout(false);
                              this.PerformLayout();

                    }

                    #endregion

                    private System.Windows.Forms.DateTimePicker dateTimePicker;
                    private System.Windows.Forms.ListBox channelList;
                    private System.Windows.Forms.ListBox programView;
                    private System.Windows.Forms.TextBox descriptionView;
                    private System.Windows.Forms.Button recordButton;
                    private System.Windows.Forms.Button seasonButton;
                    private System.Windows.Forms.Button closeButton;
          }
}