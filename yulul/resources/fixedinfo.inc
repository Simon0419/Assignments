<?php
/**
Backend data store for the assignment 1 (What happened when) -whw

Useful variables stored here are:
$events - an assocative array of information about the events 
this application "knows" about
	keys are an arbitrary ID numbers assigned to the events
	each element is an associative array about the event 
	- the keys in these arrays are:
		date - the year (YYYY) in which the event took place
		type - the kind of event
		shortdesc - a short description of the event
		details - a longer description of the event

$members - an array of the user names that are already in use in the system
(note that each user of the system must have a unique name)

$quotes - an array of quotation strings
*/


$e01 = array('type'=>'birth', 'date'=>1623, 'shortdesc'=>'Blaise Pascal born',
		'details'=>
		"He was a French mathematician, physicist, and theologian.
		He invented and built a calculating machine in 1647.", );
$e02 = array('type'=>'birth', 'date'=>1728, 
			'shortdesc'=>'Captain James Cook born',
			'details'=>
			"In 1770, Captain James Cook landed on the east coast of Australia
			and claimed it for Britain.", );
$e03 = array('type'=>'birth', 'date'=>1775, 'shortdesc'=>'Jane Austen born',
			'details'=>
				"She was an English novelist whose works of romantic fiction 
		set among the gentry have earned her a place as one of the most widely
		read and most beloved writers in English literature.", );
$e04 = array('type'=>'Australian history','date'=>1804,
			'shortdesc'=>'Hobart established',
			'details'=>
			"On October 9th, Hobart Town was established in 
			Van Diemens Land which is now known as Tasmania.");
$e05 = array('type'=>science,'date'=>1804,
			'shortdesc'=>'Platypus reported to be a mammal that lays eggs',
			'details'=>
			"George Caley was sent on a expedition to find out whether 
			this creature (which he called a \"water mole\") actually existed.  
			The local aboriginal people told him that it lived 
			a long way underground and laid eggs.");
$e08 = array('type'=>'birth', 'date'=>1893, 'shortdesc'=>'Dorothy Parker born', 
			'details'=>
			"She was an American writer and poet, best known for her wit,
			wisecracks, and sharp eye for 20th century urban foibles.");
$e09 = array('type'=>'birth', 'date'=>1893,'shortdesc'=>'Mao Tse-tung born', 
			'details'=>
			"He was a Chinese revolutionary, political theorist 
			and communist leader. 
			He led the People's Republic of China (PRC) 
			from its establishment in 1949 until his death in 1976.");
$e10 = array('type'=>'Nobel Prize', 'date'=>1903, 
			'shortdesc'=>
			'Nobel prize for Physics won by Henri Becquerel, 
			 Pierre Curie, and Marie Curie',
			'details'=>
			"for the discovery and investigation of spontaneous radioactivity");
$e11 = array('type'=>'birth','date'=>1904,'shortdesc'=>'Deng Xiaoping born', 
			'details'=>
			"He was a Chinese politician, statesman, and diplomat.
			He was a reformer who led China towards a market economy.");
$e13 = array('type'=>'Nobel Prize', 'date'=>1945,
			'shortdesc'=>
			'Nobel prize for Medicine won by Ernst B. Chain,
			Sir Alexander Fleming and Sir Howard Florey',
			'details'=>'for  work on the development of penicillin', );
$e14 = array('type'=>'science', 'date'=>1947,'shortdesc'=>'First Animals in Space', 
			'details'=>
			"Fruit flies became the first animals in space when a V-2 rocket 
			was launched from the White Sands Proving Ground. 
			Inside were several vials containing fruit flies", );
$e15 = array('type'=>'Australian history','date'=>1956,
			'shortdesc'=>'Summer Olymic Games held in Melbourne',
			'details'=>
			"This was the first time that the Olympic Games had been held in 
			the Southern Hemisphere, but the equestrian events had to be held
			elsewhere because of quarantine restrictions.", );
$e16 = array('type'=>'Australian history', 'date'=>1956, 
			'shortdesc'=>'First television boradcast in Australia', 
			'details'=>
			'Black and white television broadcasting in Australia began 
			just in time for the Opening of the Melbourne Olympic Games', );
$e17 = array('type'=>'science', 'date'=>1957,
			'shortdesc'=>'First Artificial Satellite',
			'details'=>
			"The USSR beat the United States into space by launching Sputnik 1,
			it was the world's first artificial satellite.
			Sputnik transmitted radio signals back to Earth for only a 
			short time, but it was a major accomplishment.");
$e19 = array('type'=>'science', 'date'=>1961, 'shortdesc'=>'First Man in Space',
			'details'=>
			"Russian Cosmonaut Yuri Alekseyevich Gagarin became the first human
			to venture into space.
			The Vostok 1 spacecraft made one complete orbit around Earth in
			108 minutes, and reached altitudes of 112 to 203 miles.
			The flight lasted only one hour and 48 minutes.");
$e20 = array('type'=>'Nobel Prize', 'date'=>1962,
			'shortdesc'=>
			'Nobel prize for Medicine won by Francis Crick, James Watson,
			and Maurice Wilkins',
			'details'=>
			"\"for their discoveries concerning the molecular structure of 
			nucleic acids and its significance for information transfer 
			in living material\"");
$e21 = array('type'=>'Nobel Prize', 'date'=>1962, 
			'shortdesc'=>'Nobel prize for Literature won by John Steinbeck',
			'details'=>
			"\"for his realistic and imaginative writings, combining as they do
			sympathetic humour and keen social perception\"");
$e23 = array('type'=>'science', 'date'=>1969,
			'shortdesc'=>'First Manned Moon Landing',
			'details'=>
			"Apollo 11 makes the first successful soft landing on the Moon.
			Neil Armstrong and Edwin Aldrin, Jr. become the first human beings
			to set foot on another world.");
$e24 = array('type'=>'Nobel Prize', 'date'=>1996,
			'shortdesc'=>'Nobel prize for Medicine won by Peter C. Doherty
			and Rolf M. Zinkernagel',
			'details'=>
			" \"for their discoveries concerning the specificity of 
			the cell mediated immune defence\"");
$e25 = array('type'=>'Australian history', 'date'=>2000, 
			'shortdesc'=>'Summer Olymic Games held in Sydney',
			'details'=>"These were the games of the XXVIII Olympiad.
			The motto for the games was \"Share the spirit\".");
$e27 = array('type'=>'Nobel Prize', 'date'=>2009, 
			'shortdesc'=>
			'Nobel prize for  Medicine won by Elizabeth H. Blackburn,
			Carol W. Greider, and Jack W. Szostak',
			'details'=>
			"\"for the discovery of how chromosomes are protected by 
			telomeres and the enzyme telomerase\"");



				
				
$events = array('e01' => $e01, 'e02' => $e02, 'e03' => $e03, 
				'e04' => $e04, 'e05' => $e05, 'e08' => $e08, 
				'e09' => $e09, 'e10' => $e10, 'e11' => $e11, 
				'e13' => $e13, 'e14' => $e14, 'e15' => $e15, 
				'e16' => $e16, 'e17' => $e17, 'e19' => $e19, 
				'e20' => $e20, 'e21' => $e21, 'e23' => $e23, 
				'e24' => $e24, 'e25' => $e25, 'e27' => $e27, 
				);	
					
$members = array('aardvark', 'bandicoot', 'coala', 'dingo',);

$quotes = array('Life is wonderful. Without it we\'d all be dead.', 
				'Give me ambiguity or give me something else.',
				'We are born naked, wet and hungry. Then things get worse.', 
				'Make it idiot proof and someone will make a better idiot.',
				'He who laughs last thinks slowest!',
				'Always remember you\'re unique, just like everyone else.',
				'Artificial Intelligence usually beats real stupidity.',
				'I don\'t suffer from insanity. I enjoy every minute of it.', 
				'Better to understand a little than to misunderstand a lot.',
				'We have enough youth, how about a fountain of SMART?', 
				'Programming is an art form that fights back.',
				'All wiyht. Rho sritched mg kegtops awound?', 
);
						 

		
?>