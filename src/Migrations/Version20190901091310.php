<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190901091310 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE invite ADD sender_id INT NOT NULL, ADD reciever_id INT NOT NULL, ADD status VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE invite ADD CONSTRAINT FK_C7E210D7F624B39D FOREIGN KEY (sender_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE invite ADD CONSTRAINT FK_C7E210D75D5C928D FOREIGN KEY (reciever_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_C7E210D7F624B39D ON invite (sender_id)');
        $this->addSql('CREATE INDEX IDX_C7E210D75D5C928D ON invite (reciever_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE invite DROP FOREIGN KEY FK_C7E210D7F624B39D');
        $this->addSql('ALTER TABLE invite DROP FOREIGN KEY FK_C7E210D75D5C928D');
        $this->addSql('DROP INDEX IDX_C7E210D7F624B39D ON invite');
        $this->addSql('DROP INDEX IDX_C7E210D75D5C928D ON invite');
        $this->addSql('ALTER TABLE invite DROP sender_id, DROP reciever_id, DROP status');
    }
}
