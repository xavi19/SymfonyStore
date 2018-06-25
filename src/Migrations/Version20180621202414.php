<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180621202414 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE costumer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, lastname1 VARCHAR(50) DEFAULT NULL, lastname2 VARCHAR(50) DEFAULT NULL, phone1 VARCHAR(20) DEFAULT NULL, phone2 VARCHAR(20) DEFAULT NULL, address VARCHAR(50) DEFAULT NULL, city VARCHAR(50) DEFAULT NULL, province VARCHAR(50) DEFAULT NULL, postal_code VARCHAR(10) DEFAULT NULL, country VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, emission_date DATETIME DEFAULT NULL, close_date DATETIME DEFAULT NULL, total_price DOUBLE PRECISION DEFAULT NULL, payment_type VARCHAR(50) DEFAULT NULL, discount VARCHAR(10) DEFAULT NULL, payed TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product CHANGE short_description short_description VARCHAR(100) NOT NULL, CHANGE long_description long_description VARCHAR(200) NOT NULL, CHANGE views views INT NOT NULL, CHANGE is_active is_active INT NOT NULL, CHANGE created_at created_at DATE NOT NULL, CHANGE gender gender VARCHAR(20) NOT NULL, CHANGE brand brand VARCHAR(50) NOT NULL, CHANGE weight weight DOUBLE PRECISION NOT NULL, CHANGE stock stock INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE costumer');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('ALTER TABLE product CHANGE short_description short_description VARCHAR(100) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE long_description long_description VARCHAR(200) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE views views INT DEFAULT NULL, CHANGE is_active is_active INT DEFAULT NULL, CHANGE created_at created_at DATE DEFAULT NULL, CHANGE gender gender VARCHAR(20) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE brand brand VARCHAR(50) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE weight weight DOUBLE PRECISION DEFAULT NULL, CHANGE stock stock INT DEFAULT NULL');
    }
}
