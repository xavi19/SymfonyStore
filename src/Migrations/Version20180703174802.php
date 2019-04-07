<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180703174802 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product CHANGE long_description long_description VARCHAR(200) DEFAULT NULL, CHANGE views views INT DEFAULT NULL, CHANGE is_active is_active INT DEFAULT NULL, CHANGE created_at created_at DATE DEFAULT NULL, CHANGE gender gender VARCHAR(20) DEFAULT NULL, CHANGE brand brand VARCHAR(50) DEFAULT NULL, CHANGE weight weight DOUBLE PRECISION DEFAULT NULL, CHANGE stock stock INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product CHANGE long_description long_description VARCHAR(200) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE views views INT NOT NULL, CHANGE is_active is_active INT NOT NULL, CHANGE created_at created_at DATE NOT NULL, CHANGE gender gender VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE brand brand VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE weight weight DOUBLE PRECISION NOT NULL, CHANGE stock stock INT NOT NULL');
    }
}
