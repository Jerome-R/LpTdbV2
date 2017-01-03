<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ImportCronCommand extends ContainerAwareCommand 
{ 
	protected function configure() 
	{ 
		$this 
			->setName('cron:import') 
			->setDescription('Lancement de la tache cron:import')
			->addArgument('separator', InputArgument::REQUIRED, 'CSV separator?')
			//->addOption('yell', null, InputOption::VALUE_NONE, 'Si définie, la tâche criera en majuscules')
		;
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{ 
		
		$text = $this->getDescription();
		$output->writeln($text);

		$import = $this->getContainer()->get('cron.import');

		$output->writeln("Configuration du séparateur");
		$import->setSeparator($input->getArgument('separator'));
		
		#Lncl
		# -> Set Import table clean for new update
		# -> import clients - update campaign
		# -> Delete users not in import file
		#$import->deleteImportLncl();
		#$result = $import->importClientCSVFileLncl();
		#$import->deleteClientsNotInImport();
		# -> Delete Clients not in Import to do

		#Lp
		# -> Import/update Marque / Dr / Boutique Users
		$output->writeln("Mise a jour des utilisateurs");
		$result = $import->importClientCSVFileLp("User");
		# -> Import Kpi of the month
		$output->writeln("Import des Kpis");
		$result = $import->importClientCSVFileLp("KpiMonth");
		$result = $import->importClientCSVFileLp("KpiYearToDate");
		# -> Update User fields for Kpis
		$import->setUserforKpiLp();
		$output->writeln("Archivage du fichier");
		$import->renameLastImport();

		# -> Get import result and save it
		$output->writeln("Archivage de l'import");
		$importFile = $this->getContainer()->get('import.file.log');
		$importFile->AddImportFile($result);

		$output->writeln("Tache terminee");	
	}
}