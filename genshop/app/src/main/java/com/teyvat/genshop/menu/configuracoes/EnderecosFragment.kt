package com.teyvat.genshop.menu.configuracoes

import com.teyvat.genshop.models.Endereco
import android.os.Bundle
import android.util.Log
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.recyclerview.widget.LinearLayoutManager
import com.google.android.material.snackbar.Snackbar
import com.teyvat.genshop.api.API
import com.teyvat.genshop.databinding.FragmentEnderecosBinding
import com.teyvat.genshop.models.EnumTipoEndereco
import com.teyvat.genshop.utils.EnumTipoLista
import com.teyvat.genshop.utils.GenericRecyclerViewAdapter
import com.teyvat.genshop.utils.Sessao
import com.teyvat.genshop.utils.Utilitarios
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class EnderecosFragment : Fragment() {
    lateinit var binding: FragmentEnderecosBinding
    lateinit var adapter: GenericRecyclerViewAdapter
    val listaEnderecos = arrayListOf<Endereco>()

    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?): View? {
        binding = FragmentEnderecosBinding.inflate(inflater)

        adapter = GenericRecyclerViewAdapter(listaEnderecos, EnumTipoLista.ListaEndereco.valor)
        binding.recyclerview.adapter = adapter
        binding.recyclerview.layoutManager = LinearLayoutManager(activity)

        listarEnderecos()

        return binding.root
    }

    fun listarEnderecos() {
        val callback = object: Callback<List<Endereco>> {
            override fun onResponse(call: Call<List<Endereco>>, response: Response<List<Endereco>>) {
                if(response.isSuccessful){
                    val enderecos = response.body()
                    enderecos?.let {
                        listaEnderecos.clear()
                        listaEnderecos.addAll(it)
                        adapter.notifyDataSetChanged()
                    }
                } else {
                    val error = response.errorBody().toString()
                    Utilitarios.snackBar(binding.root, error, Snackbar.LENGTH_LONG)
                    Log.e("ERROR", response.errorBody().toString())
                }
            }
            override fun onFailure(call: Call<List<Endereco>>, t: Throwable) {
                Utilitarios.snackBar(binding.root, "Não foi possível listar os endereços", Snackbar.LENGTH_LONG)
            }
        }

        API().endereco.listar("Bearer ${Sessao.usuario?.token}").enqueue(callback)
    }

    companion object {
        @JvmStatic
        fun newInstance() = EnderecosFragment()
    }
}