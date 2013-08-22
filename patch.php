<?php
namespace joomlaCorrection;

$filesToUpdate = array(
	'com_media'  => array(
			'file' => 'administrator/components/com_media/helpers/media.php',
			'lines' => array(
				68 => '       if ($format == \'\' || $format == false || (!in_array($format, $allowable) && !in_array($format, $ignored)))'
			)
	),
	'filesystem' => array(
		'file' 	=> 'libraries/joomla/filesystem/file.php',
		'lines' => array(
				63 => '    */' . PHP_EOL,
				64 => '   function makeSafe($file) {' . PHP_EOL,
				65 => '       $file = rtrim($file, \'.\');' . PHP_EOL,
				66 => "       \$regex = array('#(\.){2,}#', '#[^A-Za-z0-9\.\_\- ]#', '#^\.#');" . PHP_EOL,
				67 => '       return preg_replace($regex, \'\', $file);' . PHP_EOL,
				68 => '   }' . PHP_EOL
			)
	)
);

$welcome = <<< 'EOS'

		   _____                    _  
		  / ____|                  (_) 
		 | (_____      ____ _ _ __  _  
		  \___ \ \ /\ / / _` | '_ \| | 
		  ____) \ V  V / (_| | |_) | | 
		 |_____/ \_/\_/ \__,_| .__/|_| 
		    www.swapi.com.br | |       
		                     |_|       

	===================================================
			Patch to Joomla! 1.5.x
	===================================================



EOS;

write("\033[33m{$welcome}\033[0m");

if(isset($argv[1]))
{
	if(!file_exists($argv[1]))
	{
		write('Directory not found');
		exit(1);
	}

	// chdir($argv[1]);

	foreach ($filesToUpdate as $key => $value) 
	{
		write(sprintf("\033[44mSearching file : %s\033[0m %s", $value['file'], PHP_EOL));
		
		if(!file_exists($value['file']))
		{
			write(sprintf("\033[41mFile not Found  :(\033[0m%s", PHP_EOL));
			continue 1;
		}
		else
		{
			
			copy($value['file'], $value['file'] . '_bak');

			write(sprintf("\033[44mBacking up file: %s\033[0m %s", $value['file'], PHP_EOL));

			$sourceLines = file($value['file']);

			foreach ($value['lines'] as $line => $code)
			{
				$sourceLines[$line] = $code;
			}

			$source = implode(' ', $sourceLines);
			
			if(!empty($source))
			{
				file_put_contents($value['file'], $source);
			}

			write("\033[42mFILE PATCHED WITH SUCCESS\033[0m" . PHP_EOL . PHP_EOL . PHP_EOL);
		}

	}


	exit(0);
}

function write($message, $output = STDOUT)
{
	fwrite($output, $message);
}