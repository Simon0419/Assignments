namespace yululAssignment1
{
          partial class ToDoList
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
                              this.programView = new System.Windows.Forms.DataGridView();
                              this.deleteButton = new System.Windows.Forms.Button();
                              this.closeButton = new System.Windows.Forms.Button();
                              ((System.ComponentModel.ISupportInitialize)(this.programView)).BeginInit();
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
                              this.dateTimePicker.Value = new System.DateTime(2010, 7, 22, 0, 0, 0, 0);
                              this.dateTimePicker.ValueChanged += new System.EventHandler(this.displayProgram);
                              // 
                              // programView
                              // 
                              this.programView.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
                              this.programView.Location = new System.Drawing.Point(13, 41);
                              this.programView.Name = "programView";
                              this.programView.RowTemplate.Height = 23;
                              this.programView.Size = new System.Drawing.Size(461, 174);
                              this.programView.TabIndex = 1;
                              // 
                              // deleteButton
                              // 
                              this.deleteButton.Location = new System.Drawing.Point(13, 222);
                              this.deleteButton.Name = "deleteButton";
                              this.deleteButton.Size = new System.Drawing.Size(75, 23);
                              this.deleteButton.TabIndex = 2;
                              this.deleteButton.Text = "Delete";
                              this.deleteButton.UseVisualStyleBackColor = true;
                              this.deleteButton.Click += new System.EventHandler(this.deleteProgram);
                              // 
                              // closeButton
                              // 
                              this.closeButton.Location = new System.Drawing.Point(399, 221);
                              this.closeButton.Name = "closeButton";
                              this.closeButton.Size = new System.Drawing.Size(75, 23);
                              this.closeButton.TabIndex = 3;
                              this.closeButton.Text = "Close";
                              this.closeButton.UseVisualStyleBackColor = true;
                              this.closeButton.Click += new System.EventHandler(this.closeClick);
                              // 
                              // ToDoList
                              // 
                              this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 12F);
                              this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
                              this.ClientSize = new System.Drawing.Size(486, 262);
                              this.Controls.Add(this.closeButton);
                              this.Controls.Add(this.deleteButton);
                              this.Controls.Add(this.programView);
                              this.Controls.Add(this.dateTimePicker);
                              this.Name = "ToDoList";
                              this.Text = "ToDoList";
                              this.Load += new System.EventHandler(this.ToDoList_Load);
                              ((System.ComponentModel.ISupportInitialize)(this.programView)).EndInit();
                              this.ResumeLayout(false);

                    }

                    #endregion

                    private System.Windows.Forms.DateTimePicker dateTimePicker;
                    private System.Windows.Forms.DataGridView programView;
                    private System.Windows.Forms.Button deleteButton;
                    private System.Windows.Forms.Button closeButton;
          }
}