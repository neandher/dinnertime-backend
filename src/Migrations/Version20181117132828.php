<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181117132828 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cliente (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, cpf VARCHAR(40) NOT NULL, email VARCHAR(120) NOT NULL, telefone VARCHAR(120) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE estabelecimento (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, endereco VARCHAR(255) NOT NULL, telefone VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE horario (id INT AUTO_INCREMENT NOT NULL, estabelecimento_id INT NOT NULL, dia_semana SMALLINT NOT NULL, horario_inicio TIME NOT NULL, horario_fim TIME NOT NULL, INDEX IDX_E25853A34DBB2654 (estabelecimento_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE local_mesa (id INT AUTO_INCREMENT NOT NULL, estabelecimento_id INT NOT NULL, descricao VARCHAR(255) NOT NULL, INDEX IDX_A4ACE8214DBB2654 (estabelecimento_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mesa (id INT AUTO_INCREMENT NOT NULL, local_mesa_id INT NOT NULL, estabelecimento_id INT NOT NULL, qt_lugares SMALLINT NOT NULL, numero INT NOT NULL, INDEX IDX_98B382F216097F64 (local_mesa_id), INDEX IDX_98B382F24DBB2654 (estabelecimento_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reserva (id INT AUTO_INCREMENT NOT NULL, cliente_id INT NOT NULL, tipo_reserva_id INT NOT NULL, estabelecimento_id INT NOT NULL, datahora DATETIME NOT NULL, situacao VARCHAR(60) NOT NULL, INDEX IDX_188D2E3BDE734E51 (cliente_id), INDEX IDX_188D2E3B47F73BC0 (tipo_reserva_id), INDEX IDX_188D2E3B4DBB2654 (estabelecimento_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reserva_mesa (reserva_id INT NOT NULL, mesa_id INT NOT NULL, INDEX IDX_387CB3F9D67139E8 (reserva_id), INDEX IDX_387CB3F98BDC7AE9 (mesa_id), PRIMARY KEY(reserva_id, mesa_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_reserva (id INT AUTO_INCREMENT NOT NULL, estabelecimento_id INT NOT NULL, descricao VARCHAR(255) NOT NULL, INDEX IDX_B740F9B4DBB2654 (estabelecimento_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, estabelecimento_id INT NOT NULL, nome VARCHAR(255) NOT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_2265B05DE7927C74 (email), INDEX IDX_2265B05D4DBB2654 (estabelecimento_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE horario ADD CONSTRAINT FK_E25853A34DBB2654 FOREIGN KEY (estabelecimento_id) REFERENCES estabelecimento (id)');
        $this->addSql('ALTER TABLE local_mesa ADD CONSTRAINT FK_A4ACE8214DBB2654 FOREIGN KEY (estabelecimento_id) REFERENCES estabelecimento (id)');
        $this->addSql('ALTER TABLE mesa ADD CONSTRAINT FK_98B382F216097F64 FOREIGN KEY (local_mesa_id) REFERENCES local_mesa (id)');
        $this->addSql('ALTER TABLE mesa ADD CONSTRAINT FK_98B382F24DBB2654 FOREIGN KEY (estabelecimento_id) REFERENCES estabelecimento (id)');
        $this->addSql('ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3BDE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id)');
        $this->addSql('ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3B47F73BC0 FOREIGN KEY (tipo_reserva_id) REFERENCES tipo_reserva (id)');
        $this->addSql('ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3B4DBB2654 FOREIGN KEY (estabelecimento_id) REFERENCES estabelecimento (id)');
        $this->addSql('ALTER TABLE reserva_mesa ADD CONSTRAINT FK_387CB3F9D67139E8 FOREIGN KEY (reserva_id) REFERENCES reserva (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reserva_mesa ADD CONSTRAINT FK_387CB3F98BDC7AE9 FOREIGN KEY (mesa_id) REFERENCES mesa (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tipo_reserva ADD CONSTRAINT FK_B740F9B4DBB2654 FOREIGN KEY (estabelecimento_id) REFERENCES estabelecimento (id)');
        $this->addSql('ALTER TABLE usuario ADD CONSTRAINT FK_2265B05D4DBB2654 FOREIGN KEY (estabelecimento_id) REFERENCES estabelecimento (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reserva DROP FOREIGN KEY FK_188D2E3BDE734E51');
        $this->addSql('ALTER TABLE horario DROP FOREIGN KEY FK_E25853A34DBB2654');
        $this->addSql('ALTER TABLE local_mesa DROP FOREIGN KEY FK_A4ACE8214DBB2654');
        $this->addSql('ALTER TABLE mesa DROP FOREIGN KEY FK_98B382F24DBB2654');
        $this->addSql('ALTER TABLE reserva DROP FOREIGN KEY FK_188D2E3B4DBB2654');
        $this->addSql('ALTER TABLE tipo_reserva DROP FOREIGN KEY FK_B740F9B4DBB2654');
        $this->addSql('ALTER TABLE usuario DROP FOREIGN KEY FK_2265B05D4DBB2654');
        $this->addSql('ALTER TABLE mesa DROP FOREIGN KEY FK_98B382F216097F64');
        $this->addSql('ALTER TABLE reserva_mesa DROP FOREIGN KEY FK_387CB3F98BDC7AE9');
        $this->addSql('ALTER TABLE reserva_mesa DROP FOREIGN KEY FK_387CB3F9D67139E8');
        $this->addSql('ALTER TABLE reserva DROP FOREIGN KEY FK_188D2E3B47F73BC0');
        $this->addSql('DROP TABLE cliente');
        $this->addSql('DROP TABLE estabelecimento');
        $this->addSql('DROP TABLE horario');
        $this->addSql('DROP TABLE local_mesa');
        $this->addSql('DROP TABLE mesa');
        $this->addSql('DROP TABLE reserva');
        $this->addSql('DROP TABLE reserva_mesa');
        $this->addSql('DROP TABLE tipo_reserva');
        $this->addSql('DROP TABLE usuario');
    }
}
