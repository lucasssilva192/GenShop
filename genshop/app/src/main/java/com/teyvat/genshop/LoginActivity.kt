package com.teyvat.genshop

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import androidx.core.widget.doOnTextChanged
import com.teyvat.genshop.databinding.ActivityLoginBinding

class LoginActivity : AppCompatActivity() {
    lateinit var binding:ActivityLoginBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityLoginBinding.inflate(layoutInflater)
        setContentView(binding.root)


        binding.txtUsuario.doOnTextChanged { text, start, before, count -> binding.txtUsuarioLayout.isErrorEnabled = false }

        binding.txtSenha.doOnTextChanged { text, start, before, count ->  binding.txtSenhaLayout.isErrorEnabled = false  }

        //Evento Botão listar
        binding.btnLogin.setOnClickListener(){
            if(validarFormulario()){
                this.fazerLogin()
            }
        }

        //Evento Botão Cadastrar
        binding.btnCadastro.setOnClickListener(){
            abrirCadastro()
        }

        binding.lblEsqueciSenha.setOnClickListener(){
            abrirEsqueciSenha()
        }

    }

    fun fazerLogin(){
        val usuario = binding.txtUsuario.text.toString()
        val senha = binding.txtSenha.text.toString()
        Log.d("Login", "Usuario: $usuario")
        Log.d("Login", "Senha: $senha")
    }

    fun abrirCadastro(){
        Log.d("Login", "AbrirCadastro")
    }

    fun abrirEsqueciSenha(){
        Log.d("Login", "AbrirEsqueciSenha")
    }

    fun validarFormulario(): Boolean {
        if(binding.txtUsuario.text.isNullOrEmpty()){
            binding.txtUsuarioLayout.error = "Digite o Usuario"
            binding.txtUsuario.requestFocus()
            return false
        }
        else if(binding.txtSenha.text.isNullOrEmpty()){
            binding.txtSenhaLayout.error = "Digite a Senha"
            binding.txtSenha.requestFocus()
            return false
        }
        else {
            return true
        }
    }

}