package com.teyvat.genshop.menu.configuracoes

import android.os.Bundle
import android.util.Log
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.core.view.isVisible
import androidx.core.widget.doOnTextChanged
import com.teyvat.genshop.R
import com.teyvat.genshop.databinding.ActivityMenuBinding
import com.teyvat.genshop.databinding.FragmentDadosBinding
import com.teyvat.genshop.menu.MenuActivity
import com.teyvat.genshop.utils.Sessao
import com.teyvat.genshop.utils.Utilitarios

class DadosFragment : Fragment() {
    lateinit var binding: FragmentDadosBinding

    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?): View? {
        binding = FragmentDadosBinding.inflate(inflater)

        binding.txtNome.doOnTextChanged{ text, start, before, count -> binding.txtNomeLayout.isErrorEnabled = false  }
        binding.txtSobrenome.doOnTextChanged{ text, start, before, count -> binding.txtSobrenomeLayout.isErrorEnabled = false  }
        binding.txtDataNascimento.doOnTextChanged{ text, start, before, count -> binding.txtDataNascimentoLayout.isErrorEnabled = false  }
        binding.txtCPF.doOnTextChanged{ text, start, before, count -> binding.txtCPFLayout.isErrorEnabled = false  }
        binding.txtTelefone.doOnTextChanged{ text, start, before, count -> binding.txtTelefoneLayout.isErrorEnabled = false  }
        binding.txtCelular.doOnTextChanged{ text, start, before, count -> binding.txtCelularLayout.isErrorEnabled = false  }

        binding.btnAtualizar.setOnClickListener{
            ativaDesativaAlteracao(true)
        }

        binding.btnCancelar.setOnClickListener{
            ativaDesativaAlteracao(false)
        }

        binding.btnGravar.setOnClickListener{
            if(validarFormulario()) {
                atualizarDados()
            }
        }

        return binding.root
    }

    fun preencherFormulario() {

    }

    fun ativaDesativaAlteracao(estado: Boolean){
        binding.txtNome.isEnabled = estado
        binding.txtSobrenome.isEnabled = estado
        binding.txtDataNascimento.isEnabled = estado
        binding.txtCPF.isEnabled = estado
        binding.txtTelefone.isEnabled = estado
        binding.txtCelular.isEnabled = estado

        binding.btnGravar.isVisible = estado
        binding.btnCancelar.isVisible = estado

        binding.btnAtualizar.isVisible = !estado
    }

    fun atualizarDados(){
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

        //Atualizar Usuario aqui
        ativaDesativaAlteracao(false)
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

    companion object {
        @JvmStatic
        fun newInstance() = DadosFragment()
    }
}