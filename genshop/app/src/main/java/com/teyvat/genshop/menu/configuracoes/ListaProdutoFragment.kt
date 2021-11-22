package com.teyvat.genshop.menu.configuracoes

import android.os.Bundle
import android.util.Log
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.recyclerview.widget.LinearLayoutManager
import com.google.android.material.snackbar.Snackbar
import com.teyvat.genshop.api.API
import com.teyvat.genshop.databinding.FragmentListaProdutoBinding
import com.teyvat.genshop.models.Produto
import com.teyvat.genshop.utils.EnumTipoLista
import com.teyvat.genshop.utils.GenericRecyclerViewAdapter
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import retrofit2.Retrofit
import retrofit2.converter.gson.GsonConverterFactory

class ListaProdutoFragment : Fragment() {
    lateinit var binding: FragmentListaProdutoBinding
    lateinit var adapter: GenericRecyclerViewAdapter

    val listaProdutos = arrayListOf<Produto>()

    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?): View? {
        binding = FragmentListaProdutoBinding.inflate(inflater)

        adapter = GenericRecyclerViewAdapter(listaProdutos, EnumTipoLista.ListaProduto.valor)
        binding.recyclerview.adapter = adapter
        binding.recyclerview.layoutManager = LinearLayoutManager(activity)

        return binding.root
    }

    override fun onResume() {
        super.onResume()
        atualizarProdutos()
    }

    fun atualizarProdutos() {
        val callback = object: Callback<List<Produto>> {
            override fun onResponse(call: Call<List<Produto>>, response: Response<List<Produto>>) {
                if(response.isSuccessful){
                    val produtos = response.body()
                    produtos?.let {
                        listaProdutos.clear()
                        listaProdutos.addAll(it)
                        adapter.notifyDataSetChanged()
                    }
                } else {

                }
            }
            override fun onFailure(call: Call<List<Produto>>, t: Throwable) {
                Snackbar.make(binding.recyclerview, "Não foi possível atualizar os produtos", Snackbar.LENGTH_LONG).show()
                Log.e("ListaProdutosRvActivity", "atualizarProdutos", t)
            }
        }

        API().produto.listar().enqueue(callback)
        //API(this).produto.listar().enqueue(callback)
    }

    companion object {
        @JvmStatic
        fun newInstance() = ListaProdutoFragment()
    }
}