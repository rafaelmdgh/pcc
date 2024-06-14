DROP DATABASE financas_pessoais;
/*CREATE DATABASE financas_pessoais;
USE financas_pessoais;

CREATE TABLE usuario  (
  usuario_codigo int NOT NULL ,
  usuario_email varchar(255) NOT NULL,
  usuario_senha varchar(16) NOT NULL,
  usuario_nome varchar(255) NOT NULL,
  usuario_celular int NULL,
  PRIMARY KEY (usuario_codigo)
);

CREATE TABLE cliente  (
  cliente_usuario int NOT NULL,
  cliente_codigo int NOT NULL ,
  cliente_nome varchar(255) NOT NULL,
  cliente_valor_limite float NULL,
  PRIMARY KEY (cliente_usuario, cliente_codigo)
);



CREATE TABLE fornecedor  (
  fornecedor_usuario int NOT NULL,
  fornecedor_codigo int NOT NULL ,
  fornecedor_nome varchar(255) NOT NULL,
  fornecedor_valor_limite float NULL,
  PRIMARY KEY (fornecedor_usuario, fornecedor_codigo)
);

CREATE TABLE historico  (
  historico_usuario int NOT NULL,
  historico_codigo int NOT NULL ,
  historico_nome varchar(255) NOT NULL,
  historico_valor_limite float NULL,
  historico_tipo int NOT NULL unique,
  PRIMARY KEY (historico_usuario, historico_codigo, historico_tipo)
);

CREATE TABLE tipo_historico  (
  tipo_codigo int NOT NULL ,
  tipo_nome varchar(255) NOT NULL,
  PRIMARY KEY (tipo_codigo)
);

CREATE TABLE meta  (
  meta_usuario int NOT NULL,
  meta_codigo int NOT NULL ,
  meta_nome varchar(255) NOT NULL,
  meta_valor float NULL,
  meta_imagem varchar(255) NULL,
  PRIMARY KEY (meta_usuario, meta_codigo)
);

CREATE TABLE contas_pagar  (
  pagar_usuario int NOT NULL,
  pagar_nr_lancamento int NOT NULL ,
  pagar_dt_emissao date NOT NULL,
  pagar_codigo_fornecedor int NOT NULL,
  pagar_valor float NOT NULL,
  pagar_dt_vencimento date NOT NULL,
  pagar_observacao varchar(255) NULL,
  pagar_codigo_historico int NOT NULL,
  pagar_dt_baixa date NOT NULL,
  PRIMARY KEY (pagar_usuario, pagar_nr_lancamento)
);

CREATE TABLE contas_receber  (
  receber_usuario int NOT NULL,
  receber_nr_lancamento int NOT NULL ,
  receber_dt_emissao date NOT NULL,
  receber_codigo_cliente int NOT NULL,
  receber_valor float NOT NULL,
  receber_dt_vencimento date NOT NULL,
  receber_observacao varchar(255) NULL,
  receber_codigo_historico int NOT NULL,
  receber_dt_baixa date NOT NULL,
  PRIMARY KEY (receber_usuario, receber_nr_lancamento)
);

ALTER TABLE cliente ADD CONSTRAINT cliente_usuario_codigo FOREIGN KEY (cliente_usuario) REFERENCES usuario (usuario_codigo);
ALTER TABLE fornecedor ADD CONSTRAINT fornecedor_usuario_codigo FOREIGN KEY (fornecedor_usuario) REFERENCES usuario (usuario_codigo);
ALTER TABLE tipo_historico ADD CONSTRAINT tipo_historico_codigo FOREIGN KEY (tipo_codigo) REFERENCES historico (historico_tipo);
ALTER TABLE historico ADD CONSTRAINT historico_usuario_codigo FOREIGN KEY (historico_usuario) REFERENCES usuario (usuario_codigo);
ALTER TABLE meta ADD CONSTRAINT meta_usuario_codigo FOREIGN KEY (meta_usuario) REFERENCES usuario (usuario_codigo);
ALTER TABLE contas_pagar ADD CONSTRAINT contas_pagar_usuario_codigo FOREIGN KEY (pagar_usuario) REFERENCES usuario (usuario_codigo);
ALTER TABLE contas_pagar ADD CONSTRAINT contas_pagar_fornecedor_codigo FOREIGN KEY (pagar_codigo_fornecedor) REFERENCES fornecedor (fornecedor_codigo);
ALTER TABLE contas_pagar ADD CONSTRAINT contas_pagar_historico_codigo FOREIGN KEY (pagar_codigo_historico) REFERENCES historico (historico_codigo);
ALTER TABLE contas_receber ADD CONSTRAINT contas_receber_usuario_codigo FOREIGN KEY (receber_usuario) REFERENCES usuario (usuario_codigo);
ALTER TABLE contas_receber ADD CONSTRAINT contas_receber_cliente_codigo FOREIGN KEY (receber_codigo_cliente) REFERENCES cliente (cliente_codigo);
ALTER TABLE contas_receber ADD CONSTRAINT contas_receber_historico_codigo FOREIGN KEY (receber_codigo_historico) REFERENCES historico (historico_codigo);

*/