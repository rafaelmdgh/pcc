DROP DATABASE financas_pessoais;
CREATE DATABASE financas_pessoais;
USE financas_pessoais;

CREATE TABLE usuario  (
  usuario_codigo int NOT NULL auto_increment,
  usuario_email varchar(255) NOT NULL,
  usuario_username varchar (16) NOT NULL,
  usuario_senha varchar(16) NOT NULL,
  usuario_nome varchar(255) NOT NULL,
  usuario_celular int NULL,
  PRIMARY KEY (usuario_codigo)
) ENGINE=MYISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE cliente  (
  cliente_usuario int NOT NULL,
  cliente_codigo int NOT NULL auto_increment,
  cliente_nome varchar(255) NOT NULL,
  cliente_valor_limite decimal(10,2) NULL,
  PRIMARY KEY (cliente_usuario, cliente_codigo)
) ENGINE=MYISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE fornecedor  (
  fornecedor_usuario int NOT NULL,
  fornecedor_codigo int NOT NULL auto_increment,
  fornecedor_nome varchar(255) NOT NULL,
  fornecedor_valor_limite decimal(10,2) NULL,
  PRIMARY KEY (fornecedor_usuario, fornecedor_codigo)
) ENGINE=MYISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE tipo_historico  (
  tipo_codigo int NOT NULL auto_increment,
  tipo_nome varchar(255) NOT NULL,
  PRIMARY KEY (tipo_codigo)
) ENGINE=MYISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE historico  (
  historico_usuario int NOT NULL,
  historico_codigo int NOT NULL auto_increment,
  historico_nome varchar(255) NOT NULL,
  historico_valor_limite decimal(10,2) NULL,
  historico_tipo INT NOT NULL,
  PRIMARY KEY (historico_usuario, historico_codigo)

) ENGINE=MYISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE meta  (
  meta_usuario int NOT NULL,
  meta_codigo int NOT NULL auto_increment,
  meta_nome varchar(255) NOT NULL,
  meta_valor decimal(10,2) NULL,
  meta_imagem varchar(255) NULL,
  PRIMARY KEY (meta_usuario, meta_codigo)
) ENGINE=MYISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE contas_pagar  (
  pagar_usuario int NOT NULL,
  pagar_nr_lancamento int NOT NULL auto_increment,
  pagar_dt_emissao date NOT NULL,
  pagar_codigo_fornecedor int NOT NULL,
  pagar_valor decimal(10,2) NOT NULL,
  pagar_dt_vencimento date NOT NULL,
  pagar_observacao varchar(255) NULL,
  pagar_codigo_historico int NOT NULL,
  pagar_dt_baixa date NOT NULL,
  PRIMARY KEY (pagar_usuario, pagar_nr_lancamento)
) ENGINE=MYISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE contas_receber  (
  receber_usuario int NOT NULL,
  receber_nr_lancamento int NOT NULL auto_increment,
  receber_dt_emissao date NOT NULL,
  receber_codigo_cliente int NOT NULL,
  receber_valor decimal(10,2) NOT NULL,
  receber_dt_vencimento date NOT NULL,
  receber_observacao varchar(255) NULL,
  receber_codigo_historico int NOT NULL,
  receber_dt_baixa date NOT NULL,
  PRIMARY KEY (receber_usuario, receber_nr_lancamento)
) ENGINE=MYISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

ALTER TABLE cliente ADD CONSTRAINT cliente_usuario_codigo FOREIGN KEY (cliente_usuario) REFERENCES usuario (usuario_codigo) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE fornecedor ADD CONSTRAINT fornecedor_usuario_codigo FOREIGN KEY (fornecedor_usuario) REFERENCES usuario (usuario_codigo) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE tipo_historico ADD CONSTRAINT tipo_historico_codigo FOREIGN KEY (tipo_codigo) REFERENCES historico (historico_tipo) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE historico ADD CONSTRAINT historico_usuario_codigo FOREIGN KEY (historico_usuario) REFERENCES usuario (usuario_codigo) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE meta ADD CONSTRAINT meta_usuario_codigo FOREIGN KEY (meta_usuario) REFERENCES usuario (usuario_codigo) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE contas_pagar ADD CONSTRAINT contas_pagar_usuario_codigo FOREIGN KEY (pagar_usuario) REFERENCES usuario (usuario_codigo) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE contas_pagar ADD CONSTRAINT contas_pagar_fornecedor_codigo FOREIGN KEY (pagar_codigo_fornecedor) REFERENCES fornecedor (fornecedor_codigo) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE contas_pagar ADD CONSTRAINT contas_pagar_historico_codigo FOREIGN KEY (pagar_codigo_historico) REFERENCES historico (historico_codigo) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE contas_receber ADD CONSTRAINT contas_receber_usuario_codigo FOREIGN KEY (receber_usuario) REFERENCES usuario (usuario_codigo) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE contas_receber ADD CONSTRAINT contas_receber_cliente_codigo FOREIGN KEY (receber_codigo_cliente) REFERENCES cliente (cliente_codigo) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE contas_receber ADD CONSTRAINT contas_receber_historico_codigo FOREIGN KEY (receber_codigo_historico) REFERENCES historico (historico_codigo) ON DELETE RESTRICT ON UPDATE CASCADE;

insert into tipo_historico (tipo_nome) values ("Receitas");
insert into tipo_historico (tipo_nome) values ("Despesas Fixas");
insert into tipo_historico (tipo_nome) values ("Despesas Diversas");
insert into tipo_historico (tipo_nome) values ("Investimentos");


INSERT INTO usuario (usuario_email, usuario_username, usuario_senha, usuario_nome,usuario_celular) VALUES ("rmdallabrida@gmail.com", "rafaelmd", 1234,"Rafael",55);