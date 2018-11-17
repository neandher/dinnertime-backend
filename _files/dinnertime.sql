--
-- SGBD MYSQL
--

--
-- COMANDOS PARA CRIAÇÃO DE TODAS AS TABELAS
--

CREATE TABLE cliente (id INT NOT NULL, nome VARCHAR(255) NOT NULL, cpf VARCHAR(40) NOT NULL, email VARCHAR(120) NOT NULL, telefone VARCHAR(120) NOT NULL);
CREATE TABLE estabelecimento (id INT NOT NULL, nome VARCHAR(255) NOT NULL, endereco VARCHAR(255) NOT NULL, telefone VARCHAR(64) NOT NULL);
CREATE TABLE horario (id INT NOT NULL, estabelecimento_id INT NOT NULL, dia_semana SMALLINT NOT NULL, horario_inicio TIME NOT NULL, horario_fim TIME NOT NULL);
CREATE TABLE local_mesa (id INT NOT NULL, estabelecimento_id INT NOT NULL, descricao VARCHAR(255) NOT NULL);
CREATE TABLE mesa (id INT NOT NULL, local_mesa_id INT NOT NULL, estabelecimento_id INT NOT NULL, qt_lugares SMALLINT NOT NULL, numero INT NOT NULL);
CREATE TABLE reserva (id INT NOT NULL, cliente_id INT NOT NULL, tipo_reserva_id INT NOT NULL, estabelecimento_id INT NOT NULL, datahora DATETIME NOT NULL, situacao VARCHAR(60) NOT NULL);
CREATE TABLE reserva_mesa (reserva_id INT NOT NULL, mesa_id INT NOT NULL);
CREATE TABLE tipo_reserva (id INT NOT NULL, estabelecimento_id INT NOT NULL, descricao VARCHAR(255) NOT NULL);
CREATE TABLE usuario (id INT NOT NULL, estabelecimento_id INT NOT NULL, nome VARCHAR(255) NOT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL);

--
-- COMANDOS PARA CRIAÇÃO DE CHAVES PRIMÁRIAS
--
ALTER TABLE cliente ADD PRIMARY KEY (id);
ALTER TABLE estabelecimento ADD PRIMARY KEY (id);
ALTER TABLE horario ADD PRIMARY KEY (id);
ALTER TABLE local_mesa ADD PRIMARY KEY (id);
ALTER TABLE mesa ADD PRIMARY KEY (id);
ALTER TABLE reserva ADD PRIMARY KEY (id);
ALTER TABLE reserva_mesa ADD PRIMARY KEY (reserva_id, mesa_id);
ALTER TABLE tipo_reserva ADD PRIMARY KEY (id);
ALTER TABLE usuario ADD PRIMARY KEY (id);

--
-- COMANDOS PARA CRIAÇÃO DE CHAVES ESTRANGEIRAS
--
ALTER TABLE horario ADD CONSTRAINT FK_E25853A34DBB2654 FOREIGN KEY (estabelecimento_id) REFERENCES estabelecimento (id);
ALTER TABLE local_mesa ADD CONSTRAINT FK_A4ACE8214DBB2654 FOREIGN KEY (estabelecimento_id) REFERENCES estabelecimento (id);
ALTER TABLE mesa ADD CONSTRAINT FK_98B382F216097F64 FOREIGN KEY (local_mesa_id) REFERENCES local_mesa (id);
ALTER TABLE mesa ADD CONSTRAINT FK_98B382F24DBB2654 FOREIGN KEY (estabelecimento_id) REFERENCES estabelecimento (id);
ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3BDE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id);
ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3B47F73BC0 FOREIGN KEY (tipo_reserva_id) REFERENCES tipo_reserva (id);
ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3B4DBB2654 FOREIGN KEY (estabelecimento_id) REFERENCES estabelecimento (id);
ALTER TABLE reserva_mesa ADD CONSTRAINT FK_387CB3F9D67139E8 FOREIGN KEY (reserva_id) REFERENCES reserva (id) ON DELETE CASCADE;
ALTER TABLE reserva_mesa ADD CONSTRAINT FK_387CB3F98BDC7AE9 FOREIGN KEY (mesa_id) REFERENCES mesa (id) ON DELETE CASCADE;
ALTER TABLE tipo_reserva ADD CONSTRAINT FK_B740F9B4DBB2654 FOREIGN KEY (estabelecimento_id) REFERENCES estabelecimento (id);
ALTER TABLE usuario ADD CONSTRAINT FK_2265B05D4DBB2654 FOREIGN KEY (estabelecimento_id) REFERENCES estabelecimento (id);

--
-- INSERE DADOS EM CLIENTE
--
INSERT INTO `cliente`
VALUES (1, 'Regina Luara Bezerra', '61587904608', 'madalena.quintana@yahoo.com', '(99) 4224-4619'),
       (2, 'Dr. Ian Agostinho Martines', '62857765630', 'fatima.beltrao@gmail.com', '(82) 90499-9882'),
       (3, 'Beatriz Camacho Garcia Jr.', '21200215621', 'molina.madalena@hotmail.com', '(51) 96099-5022'),
       (4, 'Felipe Dias', '63577385146', 'joao.dasilva@bezerra.com', '(34) 3897-5311'),
       (5, 'Sr. Sebastião Brito Lozano Filho', '54683482924', 'esteves.joaquin@rico.com', '(53) 3032-7326');

--
-- INSERE DADOS EM ESTABELECIMENTO
--
INSERT INTO `estabelecimento`
VALUES (1, 'Maldonado S.A.', '86423-403, R. Cordeiro, 2207. Fundos\nSanta Elizabeth - SP', '(32) 3580-7759'),
       (2, 'Casanova e Vieira', '35600-352, R. Vitória, 7\nJosué do Sul - RN', '(35) 90997-1619'),
       (3, 'Domingues e Ortiz S.A.', '81638-698, R. Clara Marques, 96349\nSanta Paulina - SC', '(11) 3332-2119'),
       (4, 'Martines Comercial Ltda.', '67233-119, R. Corona, 94334. 82º Andar\nSanta Ornela - DF', '(32) 95481-2484'),
       (5, 'Valentin-Lira', '20137-414, Largo Demian, 84\nFaro do Sul - PR', '(84) 3373-0467');

--
-- INSERE DADOS EM HORARIO
--
INSERT INTO `horario`
VALUES (1, 1, 1, '12:38:11', '13:12:02'),
       (2, 1, 0, '13:26:19', '15:02:22'),
       (3, 1, 1, '19:22:41', '20:53:58'),
       (4, 1, 7, '14:18:08', '14:23:28'),
       (5, 1, 0, '04:27:39', '06:00:32');

--
-- INSERE DADOS EM LOCAL MESA
--
INSERT INTO `local_mesa`
VALUES (1, 1, 'Nos Fundos'),
       (2, 1, 'Segundo Andar'),
       (3, 1, 'Na entrada'),
       (4, 1, 'Qualquer Local'),
       (5, 1, 'Segundo Andar');

--
-- INSERE DADOS EM MESA
--
INSERT INTO `mesa`
VALUES (1, 2, 1, 0, 35),
       (2, 5, 1, 5, 17),
       (3, 2, 1, 3, 85),
       (4, 4, 1, 0, 37),
       (5, 2, 1, 8, 46);

--
-- INSERE DADOS EM TIPO RESERVA
--
INSERT INTO `tipo_reserva`
VALUES (1, 1, 'Aniversário'),
       (2, 1, 'Comemoração Casual'),
       (3, 1, 'Comemoração Casual'),
       (4, 1, 'Aniversário'),
       (5, 1, 'Simples');

--
-- INSERE DADOS EM RESERVA
--
INSERT INTO `reserva`
VALUES (1, 1, 1, 1, '2019-01-28 13:32:28', 'fechada'),
       (2, 1, 3, 1, '2018-12-11 09:50:52', 'nova'),
       (3, 2, 5, 1, '2019-01-03 15:50:04', 'nova'),
       (4, 2, 2, 1, '2018-12-26 23:33:40', 'fechada'),
       (5, 2, 4, 1, '2019-01-07 17:13:34', 'fechada');

--
-- INSERE DADOS EM RESERVA MESA
--
INSERT INTO `reserva_mesa`
VALUES (1, 2),
       (1, 5),
       (2, 4),
       (2, 3),
       (3, 1),
       (3, 3),
       (3, 4),
       (4, 1),
       (5, 1);

--
-- INSERE DADOS EM USUARIO
--
INSERT INTO `usuario`
VALUES (1, 1, 'Dr. Leandro Galhardo', 'mqueiros@yahoo.com', '$2y$13$T0gtsjZ6iGRSoQp4VUHJOu/rrwsgKHxhJu.YNSMgir126XGbsXn06'),
       (2, 1, 'Sr. Martinho das Neves', 'fmaia@rios.com', '$2y$13$Drh64BfdcIZuG65u5GlzDuGKO/skc9qfK01APs.67P9FFxYTKMsp2'),
       (3, 1, 'Bianca Fernandes Paz', 'tomas17@lira.info', '$2y$13$gVtB.aqbFJOuywLH3rKNu.Ng6V7kCkPnXc2pPwdF3OdijoRZtrYk.'),
       (4, 1, 'Sra. Josefina Carrara', 'fidalgo.alexa@yahoo.com', '$2y$13$uUtz7th6XjygfQVXdhqq8e4mROsH/km5xcuG018aFu2GyzoCduJA6'),
       (5, 1, 'Giovana Batista Jr.', 'vasques.ariana@hotmail.com', '$2y$13$VQsNmu6JILOMx2KGhe3tZO3Kmmh9PyD5Ci1u1NsmiQYt3gmgNQe/m');

--
-- CONSULTA: RESERVAS NOVAS COM OS DADOS DO CLIENTE E QUANTIDADE DE MESAS SOLICITADAS
--
select c.nome, c.email, c.telefone, r.datahora, r.situacao, count(rm.mesa_id) as total_mesas
from reserva r
inner join reserva_mesa rm on rm.reserva_id = r.id
inner join cliente c on c.id = r.cliente_id
where r.situacao = 'nova'
group by r.id
order by count(rm.mesa_id) desc;

--
-- CONSULTA: DETALHES DA NOVA RESERVA DO CLIENTE IAN
--
select c.nome,m.numero as mesa_numero, l.descricao as mesa_local,r.datahora,r.situacao
from reserva r
inner join reserva_mesa rm on rm.reserva_id = r.id
inner join cliente c on c.id = r.cliente_id
inner join mesa m on m.id = rm.mesa_id
inner join local_mesa l on l.id = m.local_mesa_id
where c.nome like '%ian%' and r.situacao = 'nova'
order by r.datahora asc;

--
-- CONSULTA: QUANTIDADE DE RESERVAS COM SITUAÇÃO NOVA, FECHADA E CANCELADA POR CLIENTE
--
select c.nome,
(select count(r.id) from reserva r where r.situacao = 'nova' and r.cliente_id = c.id) as total_nova,
(select count(r.id) from reserva r where r.situacao = 'fechada' and r.cliente_id = c.id) as total_fechada,
(select count(r.id) from reserva r where r.situacao = 'cancelada' and r.cliente_id = c.id) as total_cancelada
from cliente c;

--
-- CONSULTA: TOTAL DE RESERVAS POR MESA
--
select m.numero, count(rm.reserva_id) as total_reservas
from mesa m
inner join reserva_mesa rm on rm.mesa_id = m.id
group by m.id
order by count(rm.reserva_id) desc;

--
-- CONSULTA: DADOS DOS USUÁRIOS POR ESTABELECIMENTO
--
select e.nome,u.nome,u.email
from usuario u
inner join estabelecimento e on e.id = u.estabelecimento_id
order by e.nome asc;