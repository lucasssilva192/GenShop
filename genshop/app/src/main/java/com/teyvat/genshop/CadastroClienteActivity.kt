package com.teyvat.genshop

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import androidx.core.widget.doOnTextChanged
import com.teyvat.genshop.databinding.ActivityCadastroClienteBinding

class CadastroClienteActivity : AppCompatActivity() {
    lateinit var binding: ActivityCadastroClienteBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityCadastroClienteBinding.inflate(layoutInflater)
        setContentView(binding.root)

        binding.txtNome.doOnTextChanged{ text, start, before, count -> binding.txtNomeLayout.isErrorEnabled = false  }
        binding.txtSobrenome.doOnTextChanged{ text, start, before, count -> binding.txtSobrenomeLayout.isErrorEnabled = false  }
        binding.txtDataNascimento.doOnTextChanged{ text, start, before, count -> binding.txtDataNascimentoLayout.isErrorEnabled = false  }
        binding.txtCPF.doOnTextChanged{ text, start, before, count -> binding.txtCPFLayout.isErrorEnabled = false  }
        binding.txtTelefone.doOnTextChanged{ text, start, before, count -> binding.txtTelefoneLayout.isErrorEnabled = false  }
        binding.txtCelular.doOnTextChanged{ text, start, before, count -> binding.txtCelularLayout.isErrorEnabled = false  }

        binding.btnCadastrarCliente.setOnClickListener(){
            if(validarFormulario()){
                cadastrarCliente();
            }
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

    fun validarFormulario(): Boolean {
        if (binding.txtNome.text.isNullOrEmpty()) {
            binding.txtNomeLayout.error = "Digite o Nome"
            binding.txtNome.requestFocus()
            return false
        }
        else if (binding.txtSobrenome.text.isNullOrEmpty()) {
            binding.txtSobrenomeLayout.error = "Digite o Sobrenome"
            binding.txtSobrenome.requestFocus()
            return false
        }
        else if (binding.txtDataNascimento.text.isNullOrEmpty()) {
            binding.txtDataNascimentoLayout.error = "Digite a data de nascimento"
            binding.txtDataNascimento.requestFocus()
            return false
        }
        else if (binding.txtCPF.text.isNullOrEmpty() || binding.txtCPF.text.toString().length < 11) {
            binding.txtCPFLayout.error = "Digite um CPF valido"
            binding.txtCPF.requestFocus()
            return false
        }
        else if (binding.txtTelefone.text.isNullOrEmpty() ||  binding.txtTelefone.text.toString().length < 10) {
            binding.txtTelefoneLayout.error = "Digite um Telefone valido"
            binding.txtTelefone.requestFocus()
            return false
        }
        else if (binding.txtCelular.text.isNullOrEmpty() ||  binding.txtCelular.text.toString().length < 11) {
            binding.txtCelularLayout.error = "Digite um Celular valido"
            binding.txtCelular.requestFocus()
            return false
        }
        else {
            return true
        }
    }
}