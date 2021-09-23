package com.teyvat.genshop

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import com.teyvat.genshop.databinding.ActivityLoginBinding

class LoginActivity : AppCompatActivity() {
    lateinit var binding:ActivityLoginBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityLoginBinding.inflate(layoutInflater)
        setContentView(binding.root)

        //Evento Botão listar
        binding.btnLogin.setOnClickListener(){
            this.fazerLogin()
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
}