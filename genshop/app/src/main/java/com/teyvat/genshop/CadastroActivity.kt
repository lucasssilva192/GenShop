package com.teyvat.genshop

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import com.teyvat.genshop.databinding.ActivityCadastroBinding

class CadastroActivity : AppCompatActivity() {
    lateinit var binding:ActivityCadastroBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityCadastroBinding.inflate(layoutInflater)
        setContentView(binding.root)

        binding.btnCadastrar.setOnClickListener(){
            cadastrar()
        }

        binding.btnCancelar.setOnClickListener(){
            cancelar()
        }
    }

    fun cadastrar(){
        val usuario = binding.txtUsuario.text.toString()
        val email = binding.txtEmail.text.toString()
        val senha = binding.txtSenha.text.toString()
        val confirmarSenha = binding.txtConfirmarSenha.text.toString()

        Log.d("Cadastrar", "Usuario: $usuario")
        Log.d("Cadastrar", "Email: $email")
        Log.d("Cadastrar", "Senha: $senha")
        Log.d("Cadastrar", "Confirmar Senha: $confirmarSenha")
    }

    fun cancelar(){
        Log.d("Cadastrar", "Voltar para pagina de login")
    }
}