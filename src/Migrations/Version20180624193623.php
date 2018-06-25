<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180624193623 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE order_line');
        $this->addSql('ALTER TABLE `order` ADD costumer_id INT NOT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F529939860B71152 FOREIGN KEY (costumer_id) REFERENCES costumer (id)');
        $this->addSql('CREATE INDEX IDX_F529939860B71152 ON `order` (costumer_id)');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12854AC3');
        $this->addSql('DROP INDEX IDX_D34A04AD12854AC3 ON product');
        $this->addSql('ALTER TABLE product DROP order_reference_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE order_line (id INT AUTO_INCREMENT NOT NULL, units INT DEFAULT NULL, unit_price DOUBLE PRECISION DEFAULT NULL, discount DOUBLE PRECISION DEFAULT NULL, line_price DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F529939860B71152');
        $this->addSql('DROP INDEX IDX_F529939860B71152 ON `order`');
        $this->addSql('ALTER TABLE `order` DROP costumer_id');
        $this->addSql('ALTER TABLE product ADD order_reference_id INT NOT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12854AC3 FOREIGN KEY (order_reference_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD12854AC3 ON product (order_reference_id)');
    }
}
