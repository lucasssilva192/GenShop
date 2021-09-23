package com.teyvat.genshop

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import com.teyvat.genshop.databinding.ActivityCadastroClienteBinding

class CadastroClienteActivity : AppCompatActivity() {
    lateinit var binding: ActivityCadastroClienteBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityCadastroClienteBinding.inflate(layoutInflater)
        setContentView(binding.root)

        binding.btnCadastrarCliente.setOnClickListener(){
            cadastrarCliente();
        }

        binding.btnCancelarCadastro.setOnClickListener(){
            cancelarCadastro();
        }

    }

    fun cadastrarCliente(){
        val nome = binding.txtNome.text.toString()
        val sobrenome = binding.txtSobrenome.text.toString()
        val dataNascimento = binding.txtDataNascimento.text.toString()
        val cpf = binding.txtCPF.text.toString()
        val telefone = binding.txtTelefone.text.toString()
        val celular = binding.txtTelefone.text.toString()

        Log.d("CadastrarCliente", "Nome: $nome")
        Log.d("CadastrarCliente", "Sobrenome: $sobrenome")
        Log.d("CadastrarCliente", "Data Nascimento: $dataNascimento")
        Log.d("CadastrarCliente", "CPF: $cpf")
        Log.d("CadastrarCliente", "Telefone: $telefone")
        Log.d("CadastrarCliente", "Celular: $celular")
    }

    fun cancelarCadastro(){
        Log.d("Cadastrar", "Voltar para pagina anterior")
    }
}