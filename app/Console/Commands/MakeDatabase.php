<?php

namespace App\Console\Commands;

use PDO;
use PDOException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MakeDatabase extends Command
{

  protected $signature = 'make:database';
  protected $description = 'Initialize database, migrate tables, seed records';

  public function __construct()
  {
    parent::__construct();
  }

  public function handle()
  {
    $database = config('database.connections.mysql.database');

    $host = config('database.connections.mysql.host');
    $port = config('database.connections.mysql.port');
    $username = config('database.connections.mysql.username');
    $password = config('database.connections.mysql.password');
    $charset = config('database.connections.mysql.charset');
    $collation = config('database.connections.mysql.collation');

    try 
    {
      $pdo = new PDO(sprintf('mysql:host=%s;port=%d;', $host, $port), $username, $password);

      $pdo->exec(sprintf('DROP DATABASE IF EXISTS %s', $database));

      $this->warn(sprintf('Successfully dropped database: %s', $database));

      $pdo->exec(sprintf(
        'CREATE DATABASE IF NOT EXISTS %s CHARACTER SET %s COLLATE %s;',
        $database,
        $charset,
        $collation
      ));

      $this->info(sprintf('Successfully created database: %s', $database));
      $this->info('');

      $this->call('migrate', [ '--seed' => true ]);
      $this->info('');
    } 
    catch (PDOException $ex) 
    {
      $this->error(sprintf('Failed to create database %s: %s', $database, $ex->getMessage()));
    }

  }
}
