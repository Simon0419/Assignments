-- phpMyAdmin SQL Dump
-- version 3.5.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2013 at 05:56 PM
-- Server version: 5.1.61
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `KXT471_2013`
--

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE IF NOT EXISTS `tweets` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Tweets` text NOT NULL,
  `SearchKeywords` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`ID`, `Tweets`, `SearchKeywords`) VALUES
(1, 'Aloha~ to breathe the essence of life with compassion: Fallon shares discoveries on and off the mat at Wanderlust. http://bit.ly/wanderlustoahu ', 'Fallon'),
(2, 'Dr. Benjamin not on board with transgender female, Fallon Fox fighting professionally Re: @DrJCBenjamin... http://fb.me/2xqvwBKFc ', 'Fallon'),
(3, 'MMA Fighter Fallon Fox May Lose Her License After Revealing She''s a Trans Woman http://bit.ly/XympV0 ', 'Fallon'),
(4, 'Please check out this important article about @FallonFox first openly transgender woman MMA fighter. http://sportsillustrated.cnn.com/mma/news/20130307/fallon-fox-profile/?sct=mma_t11_a5 … #LetFallonFight', 'Fallon'),
(5, '.@UFC fighter Liz Carmouche @iamgirlrilla makes statement in support of Fallon Fox @FallonFox http://www.glaad.org/blog/ufc-fighter-liz-carmouche-makes-statement-support-fallon-fox … #LGBT', 'Fallon'),
(6, 'Jimmy Fallon looks poised to do what Conan couldn''t - unseat Leno for the late-night throne http://nyp.st/16bt4aX ', 'Fallon'),
(7, 'Dear NBC: How about someone who''s not a white dude replace Jimmy Fallon when the time comes? http://slate.me/Xt7zzf  #HowardStern #latenight', 'Fallon'),
(8, 'You guys, peer pressure really works. Thanks to all of you for forcing @jimmyfallon to buy my book. http://amzn.to/t6sAzi ', 'Fallon'),
(9, 'Late Night with Howard Stern? Looks like Stern is being groomed to replace Jimmy Fallon http://nyp.st/13FffSk ', 'Fallon'),
(10, 'Awww fool me once.. @HuffPostComedy: Leno departure confirmed by NBC http://huff.to/14f8D9c ', 'Fallon'),
(11, '#Celebrity #Music Mariah Carey Plays Champagne Pong with Jimmy Fallon -... http://dlvr.it/328Hx1  #Life Aooo', 'Fallon'),
(12, 'Funny Jimmy Fallon Late Night Quotes And Jokes From November 2011 http://www.thejokeindex.com/jimmyfallon-latenight-november11.html … #jokes', 'Fallon'),
(13, 'Meet Catherine Giudici, the Amazon designer from #Seattle that just won #TheBachelor http://www.geekwire.com/2013/meet-catherine-giudici-amazon-designer-won-bachelor/ …', 'Catherine'),
(14, 'Who did Sean give his final rose (and ring) to: Lindsay or Catherine? Spoiler alert! http://usm.ag/XEGQzC  #BachelorFinale #Bachelor', 'Catherine'),
(15, 'Selena Gomez reportedly considering taking Justin Bieber back if her latest film flops http://huff.to/13PPTkE ', 'Justin'),
(16, 'TMZ Live: Justin Bieber -- Concert Canceled Due to Slumping Sales http://tmz.me/12K4Ntz ', 'Justin'),
(17, '#F1 Having turned struggling Teams in the past into a strong package, Will Toro Rosso act as a Testbed for James Key? http://www.rachf1.com/4/post/2013/03/three-to-think-toro-rosso.html …', 'Toro'),
(18, '#F1 Having turned struggling Teams in the past into a strong package, Will Toro Rosso act as a Testbed for James Key? http://www.rachf1.com/4/post/2013/03/three-to-think-toro-rosso.html …', 'Toro'),
(19, 'Class. Melbourne''s ''Herald Sun'' reckons @danielricciardo drives for Torro Rorro and his team mate is Eric Vergne. http://www.heraldsun.com.au/sport/motor-sport/toro-rosso-driver-daniel-ricciardo-chasing-formula-one-dream/story-fnebo26y-1226594801320 …', 'Toro'),
(20, 'Got a question for @danielricciardo? Ask it yourself on Tuesday morning HERE: http://j.mp/Y3JtL5  #F1 @ausgrandprix', 'Toro'),
(21, 'Could Antonio Felix da Costa pose a threat to Ricciardo and Vergne''s seats in 2013? http://motorsportstalk.nbcsports.com/2013/03/09/da-costa-poses-threat-to-toro-rosso-drivers/ … #F1onNBC', 'Toro'),
(22, 'Button considered Toro Rosso move in 2008: Jenson Button considered switching to Toro Ros... http://bit.ly/10ouRsT  #TheF1Family #F1News', 'Toro'),
(23, 'Button considered Toro Rosso move - Horner http://bit.ly/YFVMw5  #f1', 'Toro'),
(24, 'Season Preview: Toro Rosso: Toro Rosso: The small Red Bull junior team is a bit of an enigma. They were clea... http://bit.ly/14sSeOr ', 'Toro'),
(25, 'No Podium Position In Sight For Toro Rosso F1 Team This Season http://dlvr.it/32ljrD ', 'Toro'),
(26, 'Stats from Barcelona pre-season tests http://j.mp/WIOlBX  #motorsport #f1 #news', 'Toro'),
(27, 'Look out for the Toro Rosso preview as I countdown to the @ausgrandprix on http://itsanf1life.com !', 'Toro'),
(28, 'Ricciardo: 2012 form no longer enough - Toro Rosso http://asia.eurosport.com/formula-1/ricciardo-2012-form-no-longer-enough_sto3651801/story.shtml?utm_source=dlvr.it&utm_medium=twitter … #Formula1#FormulaOne #F1', 'Toro'),
(29, 'Clifton Collins Jr. (@ccollinsjr) Makes the New Guillermo del Toro & Terrence Malick Movies Sound Awesome.. http://bullettmedia.com/article/clifton-collins-jr-makes-the-new-guillermo-del-toro-terrence-malick-movies-sound-awesome/ …', 'Toro'),
(30, '#Juncadella desmiente los rumores que le relacionan con el puesto de tercer piloto de Mercedes http://ow.ly/i31Ur  #tororosso #forceindia', 'Toro'),
(31, 'Formel 1 (11:09) - Perez und Ricciardo auf Doping getestet: McLaren-Neuzugang Sergio Perez und Toro-Rosso-Pilo... http://bit.ly/YrXIby ', 'Supreme Court'),
(32, 'BREAKING: NY Supreme Court halts Bloomberg''s soda ban, set to take effect tomorrow http://nyp.st/10wHluG ', 'Supreme Court'),
(33, 'New York Supreme Court Tells State to Prove New Gun Laws Are Constitutional Or Else http://bit.ly/YG0HhD  http://equalforce.net  #2A #news', 'Supreme Court'),
(34, 'Analysis: Death, taxes and Supreme Court''s gay marriage case http://reut.rs/ZhuFqI ', 'Supreme Court'),
(35, 'NYPD Cop Hits Supreme Court Judge In The Throat http://libertycrier.com/government/nypd-cop-hits-supreme-court-judge-in-the-throat/ …', 'Supreme Court'),
(36, '#TakeThat !! Bloomberg''s Big Gulp Ban Slapped Down By NY Supreme Court Judge : Freedom Outpost - http://po.st/kA1DUK/ ', 'Supreme Court'),
(37, 'America is veering towards dictatorship, Supreme court justices and top government officials warn http://www.naturalnews.com/039431_America_dictatorship_Supreme_Court.html …', 'Supreme Court'),
(38, 'What you need to know about a recent state Supreme Court decision on medical marijuana http://huff.to/13MucCe ', 'Supreme Court'),
(39, 'FLAWED New Family Structures Study Intended To Sway Supreme Court On Gay Marriage, Documents Show http://huff.to/14LgV91  #UniteBlue', 'Supreme Court'),
(40, 'The Editor of a newspaper shall be responsible for publishing false or offensive news report : Supreme Court http://www.firstpost.com/india/editor-will-be-held-responsible-in-cases-of-false-reporting-sc-656491.html …', 'Supreme Court'),
(41, 'Gay Marriage Watch: New Mexico, USA: State Supreme Court Hears Case of Photographer Who Re... http://bit.ly/ZCYyDM  #gaymarriage #MEUSA', 'Supreme Court'),
(42, '#USA - Supreme Court justice answers girl''s gay marriage letter MORE: http://i.actup.org/Y4SLGw  #lgbt pic.twitter.com/5annnIBfQ2', 'Supreme Court'),
(43, 'Supreme Court on editor''s responsibility, http://www.indianexpress.com/news/editor-to-be-held-responsible-in-cases-of-false-reporting-supreme-court/1086447/ …', 'Supreme Court'),
(44, '#Mexico-Supreme Court of Justice of the Nation condemns homophobia. Good precedent for rights http://i.actup.org/Y52DQI  pic.twitter.com/wxQmXeOc0f', 'Supreme Court'),
(45, 'N.Y. Supreme Court Strikes Down Soda Ban: This afternoon, a New York State supreme court judge halted the impl... http://bit.ly/ZBSbAH ', 'Supreme Court'),
(46, 'RT @coalaction: Tiny enviro group sues mining giants in NZ Supreme Court: #climate must be considered in #coal plans http://coalactionnetworkaotearoa.wordpress.com/2013/03/11/coal-vs-climate-at-supreme-court/alactionnetworkaotearoa.wordpress.com/2013/03/11/coa… …', 'Supreme Court'),
(47, 'The season preview continues with Toro Rosso! @Formula1_com http://itsanf1life.com/2013/03/06/season-preview-toro-rosso/ …', 'Supreme Court'),
(48, '''Bring back the death penalty,'' Jill Meagher accused tells police http://www.theage.com.au/victoria/bring-back-death-penalty-meagher-accused-20130312-2fx8i.html … via @theage', 'Jill Meagher'),
(49, '#JillMeagher accused says he should get "the death penalty" at committal hearing http://yhoo.it/10DvoTX ', 'Jill Meagher'),
(50, 'Bayley police interview transcript. Edited version of what was tendered to court in Jill Meagher case http://www.theage.com.au/victoria/bayley-police-interview-transcript-20130313-2fzqs.html … via @theage', 'Jill Meagher'),
(51, 'Photos of Jill Meagher''s belongings emerge from police evidence | http://www.news.com.au/breaking-news/photos-documenting-the-jill-meagher-case-emerge-from-police-brief-of-evidence/story-e6frfkp9-1226595956235 …(Picture: Andrew Tauber) pic.twitter.com/2JFMvN43pv', 'Jill Meagher'),
(52, '.@3awNeilMitchell: Jill Meagher or anybody like her should be able to walk streets alone at night, but they can''t http://bit.ly/10D5UpK ', 'Jill Meagher'),
(53, 'Jill Meagher''s killer walks a time worn path - It''s impossible to ignore the similarities in the explanations… http://tmblr.co/ZYaF2yg7uWa9 ', 'Jill Meagher'),
(54, 'Jill Meagher''s brave family faces accused killer Adrian Ernest Bayley after he pleaded not guilty to her murder http://hsun.info/WGlhjB ', 'Jill Meagher'),
(55, 'Vote for the best couple - #Tiva http://insidepulse.com/2013/03/11/ins ', 'big bang'),
(56, 'CBS Continues Primetime Dominance With ‘NCIS’, ‘The Big Bang Theory’ http://dlvr.it/34Nqk5', 'big bang'),
(57, 'TV Ratings Broadcast Top 25:Among Adults 18-49, ''NCIS'' Number 1 With Total Viewers http://tvbythenumbers.zap2it.com/2013/03/12/tv-ratings-broadcast-top-25-the-big-bang-theory-tops-week-24-viewing-among-adults-18-49-ncis-number-1-with-total-viewers/173046/ …', 'big bang'),
(58, 'CBS Announces Finale Dates for ''Person of Interest'', ''The Big Bang Theory'', ''The Good Wife'', ''Vegas'' & More http://tvbythenumbers.zap2it.com/2013/03/11/cbs-announces-finale-dates-for-the-good-wife-elementary-person-of-interest-vegas-ncis-the-big-bang-theory-more/172911/ …', 'big bang'),
(59, 'CBS Announces Season Finale Dates: Which Four Shows Are Getting Two-Hour Send-Offs? http://tvline.com/2013/03/11/cbs-season-finale-dates-ncis-big-bang-theory-good-wife/ …', 'big bang'),
(60, 'Click here for a full list of the new UAE Cabinet announced by Shaikh Mohammad Bin Rashid: http://bit.ly/10zHoWt ', 'Cabinet'),
(61, 'Mixed fortunes for Knox MPs in #springst cabinet reshuffle today. http://www.knoxweekly.com.au/story/1361130/wells-takes-on-police-as-napthine-dumps-ryan/?cs=1461 …', 'Cabinet'),
(62, '''New young faces'' for UAE Cabinet as Sheikh Mohammed unveils reshuffle - The National http://shar.es/egIJI  @sharethis', 'Cabinet'),
(63, 'Sheikh Mohammed announces UAE cabinet reshuffle http://www.emirates247.com/news/government/mohammed-announces-uae-cabinet-reshuffle-2013-03-12-1.498330 …', 'Cabinet'),
(64, 'First UAE cabinet reshuffle in five years http://on.ft.com/XFM7XK ', 'Cabinet'),
(65, 'Spokesperson: Cabinet reshuffle ''off the table'' - http://www.egyptindependent.com/news/spokesperson-cabinet-reshuffle-table … #Egypt', 'Cabinet'),
(66, '#Liberia Cabinet Reshuffle (Part XXII) Announced. Congrats to the new team of dynamic young Liberians at MCI. http://emansion.gov.lr/2press.php?news_id=2529&related=7&pg=sp …', 'Cabinet'),
(67, 'Interesting that Wollaston is vocally asking for a cabinet reshuffle: http://www.telegraph.co.uk/news/politics/9921037/David-Cameron-needs-a-partisan-policy-unit-to-get-a-grip-on-Government.html … Wouldn''t have expected that.', 'Cabinet'),
(68, 'RT @voiceofdelta: Governor Uduaghan Set To Reshuffle Cabinet - Voice Of Delta | Voice Of Delta http://voiceofdelta.com/?p=165 ', 'Cabinet'),
(69, 'China Unveils Plans To Reshuffle Cabinet; Keen To Dissolve Railways Ministry http://dlvr.it/33ksZv ', 'Cabinet'),
(70, 'China Unveils Cabinet Reshuffle Plan Aimed At Cutting Red Tapism: China unveiled plans to res... http://bit.ly/10xA8hO  #IBTimes', 'Cabinet'),
(71, 'China unveils cabinet reshuffle plan: BEIJING, March 10 (Xinhua) -- The State Council, or China''s cabinet, wil... http://bit.ly/14Ig5tH ', 'Cabinet'),
(72, 'Sonny Bill Williams will make his first start for the Sydney Roosters against the New Zealand Warriors on Saturday http://bit.ly/W5mNum ', 'Sonny Bill Williams'),
(73, 'SBW returns a ''better player'': Sonny Bill Williams will return to the NRL wiser and better than when he left five ... http://n24.cm/104V7o7 ', 'Sonny Bill Williams'),
(74, 'Latest: SBW''s back in the NRL and a better player (NZ Newswire): Sonny Bill Williams took four years to fully ... http://yhoo.it/VDNIgC ', 'Sonny Bill Williams'),
(75, 'SBW has outgrown injury hoodoo: doctor: Sonny Bill Williams'' body is better equipped now to deal with the rigo... http://bit.ly/104OMZV ', 'Sonny Bill Williams'),
(76, 'SBW dominates build-up to NRL opener: Sonny Bill Williams name is dominating the build-up to Thursday''s NRL se... http://bit.ly/VDwm3D ', 'Sonny Bill Williams'),
(77, 'Chiefs backline adjusts to life after Sonny Bill: Sonny Bill Williams comes to Auckland this weekend wi... http://bit.ly/ZGvgnL  #rugby', 'Sonny Bill Williams'),
(78, 'Queen Elizabeth II to back gay rights? http://huff.to/14K0ObZ ', 'Queen Elizabeth'),
(79, 'Queen Elizabeth II cancels more engagements following stomach illness http://bit.ly/12Ns51F ', 'Queen Elizabeth'),
(80, 'Queen Elizabeth II cancels more public appearances as she continues to suffer from symptoms of gastroenteritis http://bit.ly/Zy0KZM ', 'Sonny Bill Williams'),
(81, 'Who takes over the onerous duties of Monarchying when Elisabeth is unwell? http://www.telegraph.co.uk/news/uknews/queen-elizabeth-II/9925637/Queen-pulls-out-of-more-public-engagements-due-to-illness.html …', 'Sonny Bill Williams'),
(82, 'Is Queen Elizabeth II ready to support gay rights? A document she''s set to sign today suggests yes: http://abcn.ws/10DQJAl ', 'Queen Elizabeth'),
(83, 'Daily Mail: Queen Elizabeth II fights for gay rights - http://www.dailymail.co.uk/news/article-2290824/Queen-fights-gay-rights-Monarch-makes-historic-pledge-discrimination-hints-Kate-DOES-girl-means-equal-rights-throne.html …', 'Queen Elizabeth'),
(84, 'Queen Elizabeth II to Sign Historic Pledge Against Discrimination Seen As Signal of Gay Rights Support http://tlrd.us/15EOGeo ', 'Queen Elizabeth'),
(85, 'Breaking News Ground : Kevin Annett : Citizens Arrest Warrants Issued : 30 Church officials includin http://fb.me/1ASJqY7q8 ', 'Queen Elizabeth'),
(86, '#Celebrity #Gossip Kate Moss as Queen Elizabeth II, Victoria Beckham as Queen... http://dlvr.it/32cgLC  #TFB Qo', 'Queen Elizabeth'),
(87, 'Benjamin Fulford ~ttempt Against Queen Elizabeth II Foiled, Manhunt On For Former “Black Pope” Peter Hans Kolvenbach http://soundofheart.org/galacticfreepress/node/34200 …', 'Queen Elizabeth'),
(88, 'Pass or fail? Kiama mum grades the #NBN http://www.illawarramercury.com.au/story/1356891/pass-or-fail-kiama-mum-grades-the-nbn/?cs=12 … | According to @turnbullmalcolm this family don''t need simultaneous internet', 'NBN'),
(89, 'Turnbull faces questions on NBN journalist bullying: http://bit.ly/13UFEfl ', 'NBN'),
(90, 'Pulse+IT: Grants still being decided for NBN-enabled telehealth program http://bit.ly/14UkBp9  #healthit #ehealth', 'NBN'),
(91, 'People say the darnedest things RT @rynobi: The NBN will be disastrous for the music industry ... really? http://buff.ly/X4C8rn ', 'NBN'),
(92, 'Cabling Experts: A NBN reality check - Business Spectator: A NBN reality checkBusiness SpectatorDespite buildi... http://bit.ly/YZeEGs ', 'NBN'),
(93, 'Coalition has three options for NBN: report @alliecoyne Coalition would defer fibre-to-the-premise spending ... http://www.itnews.com.au/News/336221,coalition-has-three-options-for-nbn-report.aspx …', 'NBN'),
(94, 'PLC Armidale excited this morning about their edit workshop with @abcopen for NBN Pilot #makingthenews @abcnewengland http://bit.ly/11ReplK ', 'NBN'),
(95, 'Coalition has three options for NBN: report @alliecoyne Coalition would defer fibre-to-the-premise spending ... http://www.itnews.com.au/News/336221,coalition-has-three-options-for-nbn-report.aspx …', 'NBN'),
(96, 'Progressives have to take country kicking & screaming into future http://www.independentaustralia.net/2013/politics/nick-ross-the-abc-and-what-lies-beneath-the-australians-lies/ … Dont let Murdoch con us out of the NBN #auspol', 'NBN'),
(97, 'How one uni is using the NBN to develop projects ''outside the box'' that help everybody from kids to grandparents: http://www.une.edu.au/faculties/professions/fibre-enabled/ …', 'NBN'),
(98, '"Blowing Thought Bubbles Like A Preschooler With Bubblegum" @sortius on Turnbull''s latest brainfart: http://sortius-is-a-geek.com/?p=2829  #auspol #NBN', 'NBN'),
(99, 'Malcolm Turnbull says NBN Co has excluded seat likely to vote Liberal from rollout plan #auspol http://www.afr.com/p/national/turnbull_accuses_nbn_co_of_labor_b1WU37JchSi3l39I1AHc5M …', 'NBN'),
(100, 'Monthly cost of NBN connection less than $30  #digitalnewcastle http://www.theherald.com.au/story/1345221/monthly-cost-of-nbn-connection-less-than-30/?cs=305 …', 'NBN');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
