namespace yululAssignment1
{
          partial class DVR
          {
                    /// <summary>
                    /// 必需的设计器变量。
                    /// </summary>
                    private System.ComponentModel.IContainer components = null;

                    /// <summary>
                    /// 清理所有正在使用的资源。
                    /// </summary>
                    /// <param name="disposing">如果应释放托管资源，为 true；否则为 false。</param>
                    protected override void Dispose(bool disposing)
                    {
                              if (disposing && (components != null))
                              {
                                        components.Dispose();
                              }
                              base.Dispose(disposing);
                    }

                    #region Windows 窗体设计器生成的代码

                    /// <summary>
                    /// 设计器支持所需的方法 - 不要
                    /// 使用代码编辑器修改此方法的内容。
                    /// </summary>
                    private void InitializeComponent()
                    {
                        this.menuStrip1 = new System.Windows.Forms.MenuStrip();
                        this.fileToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
                        this.importToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
                        this.exportToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
                        this.quitToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
                        this.viewToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
                        this.toDoListToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
                        this.seasonPassManagerToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
                        this.tVGuideToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
                        this.menuStrip1.SuspendLayout();
                        this.SuspendLayout();
                        // 
                        // menuStrip1
                        // 
                        this.menuStrip1.Items.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.fileToolStripMenuItem,
            this.viewToolStripMenuItem});
                        this.menuStrip1.Location = new System.Drawing.Point(0, 0);
                        this.menuStrip1.Name = "menuStrip1";
                        this.menuStrip1.Size = new System.Drawing.Size(284, 24);
                        this.menuStrip1.TabIndex = 0;
                        this.menuStrip1.Text = "menuStrip1";
                        // 
                        // fileToolStripMenuItem
                        // 
                        this.fileToolStripMenuItem.DropDownItems.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.importToolStripMenuItem,
            this.exportToolStripMenuItem,
            this.quitToolStripMenuItem});
                        this.fileToolStripMenuItem.Name = "fileToolStripMenuItem";
                        this.fileToolStripMenuItem.Size = new System.Drawing.Size(37, 20);
                        this.fileToolStripMenuItem.Text = "File";
                        // 
                        // importToolStripMenuItem
                        // 
                        this.importToolStripMenuItem.Name = "importToolStripMenuItem";
                        this.importToolStripMenuItem.Size = new System.Drawing.Size(152, 22);
                        this.importToolStripMenuItem.Text = "Import";
                        this.importToolStripMenuItem.Click += new System.EventHandler(this.importXML);
                        // 
                        // exportToolStripMenuItem
                        // 
                        this.exportToolStripMenuItem.Name = "exportToolStripMenuItem";
                        this.exportToolStripMenuItem.Size = new System.Drawing.Size(152, 22);
                        this.exportToolStripMenuItem.Text = "Export";
                        this.exportToolStripMenuItem.Click += new System.EventHandler(this.exportXML);
                        // 
                        // quitToolStripMenuItem
                        // 
                        this.quitToolStripMenuItem.Name = "quitToolStripMenuItem";
                        this.quitToolStripMenuItem.Size = new System.Drawing.Size(152, 22);
                        this.quitToolStripMenuItem.Text = "Quit";
                        this.quitToolStripMenuItem.Click += new System.EventHandler(this.quitProgram);
                        // 
                        // viewToolStripMenuItem
                        // 
                        this.viewToolStripMenuItem.DropDownItems.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.toDoListToolStripMenuItem,
            this.seasonPassManagerToolStripMenuItem,
            this.tVGuideToolStripMenuItem});
                        this.viewToolStripMenuItem.Name = "viewToolStripMenuItem";
                        this.viewToolStripMenuItem.Size = new System.Drawing.Size(44, 20);
                        this.viewToolStripMenuItem.Text = "View";
                        // 
                        // toDoListToolStripMenuItem
                        // 
                        this.toDoListToolStripMenuItem.Name = "toDoListToolStripMenuItem";
                        this.toDoListToolStripMenuItem.Size = new System.Drawing.Size(187, 22);
                        this.toDoListToolStripMenuItem.Text = "To Do List";
                        this.toDoListToolStripMenuItem.Click += new System.EventHandler(this.displayToDoList);
                        // 
                        // seasonPassManagerToolStripMenuItem
                        // 
                        this.seasonPassManagerToolStripMenuItem.Name = "seasonPassManagerToolStripMenuItem";
                        this.seasonPassManagerToolStripMenuItem.Size = new System.Drawing.Size(187, 22);
                        this.seasonPassManagerToolStripMenuItem.Text = "Season Pass Manager";
                        this.seasonPassManagerToolStripMenuItem.Click += new System.EventHandler(this.displayManager);
                        // 
                        // tVGuideToolStripMenuItem
                        // 
                        this.tVGuideToolStripMenuItem.Name = "tVGuideToolStripMenuItem";
                        this.tVGuideToolStripMenuItem.Size = new System.Drawing.Size(187, 22);
                        this.tVGuideToolStripMenuItem.Text = "TV Guide";
                        this.tVGuideToolStripMenuItem.Click += new System.EventHandler(this.displayGuide);
                        // 
                        // DVR
                        // 
                        this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
                        this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
                        this.ClientSize = new System.Drawing.Size(284, 284);
                        this.Controls.Add(this.menuStrip1);
                        this.MainMenuStrip = this.menuStrip1;
                        this.Name = "DVR";
                        this.Text = "DVR";
                        this.Load += new System.EventHandler(this.DVR_Load);
                        this.menuStrip1.ResumeLayout(false);
                        this.menuStrip1.PerformLayout();
                        this.ResumeLayout(false);
                        this.PerformLayout();

                    }

                    #endregion

                    private System.Windows.Forms.MenuStrip menuStrip1;
                    private System.Windows.Forms.ToolStripMenuItem fileToolStripMenuItem;
                    private System.Windows.Forms.ToolStripMenuItem importToolStripMenuItem;
                    private System.Windows.Forms.ToolStripMenuItem exportToolStripMenuItem;
                    private System.Windows.Forms.ToolStripMenuItem quitToolStripMenuItem;
                    private System.Windows.Forms.ToolStripMenuItem viewToolStripMenuItem;
                    private System.Windows.Forms.ToolStripMenuItem toDoListToolStripMenuItem;
                    private System.Windows.Forms.ToolStripMenuItem seasonPassManagerToolStripMenuItem;
                    private System.Windows.Forms.ToolStripMenuItem tVGuideToolStripMenuItem;
          }
}

