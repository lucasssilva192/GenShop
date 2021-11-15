package com.teyvat.genshop.menu.configuracoes

import android.os.Bundle
import android.util.Log
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.recyclerview.widget.LinearLayoutManager
import com.google.android.material.snackbar.Snackbar
import com.teyvat.genshop.R
import com.teyvat.genshop.api.API
import com.teyvat.genshop.databinding.FragmentLojasBinding
import com.teyvat.genshop.models.Loja
import com.teyvat.genshop.models.Produto
import com.teyvat.genshop.utils.EnumTipoLista
import com.teyvat.genshop.utils.GenericRecyclerViewAdapter
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class LojasFragment : Fragment() {
    lateinit var binding: FragmentLojasBinding
    lateinit var adapter: GenericRecyclerViewAdapter

    val listaLojas = arrayListOf<Loja>()

    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?): View? {
        binding = FragmentLojasBinding.inflate(inflater)

        adapter = GenericRecyclerViewAdapter(listaLojas, EnumTipoLista.ListaLoja.valor)
        binding.recyclerView.adapter = adapter
        binding.recyclerView.layoutManager = LinearLayoutManager(activity)

        return binding.root
    }

    override fun onResume() {
        super.onResume()
        atualizarLojas()
    }

    fun atualizarLojas() {
        val callback = object: Callback<List<Loja>> {
            override fun onResponse(call: Call<List<Loja>>, response: Response<List<Loja>>) {
                if(response.isSuccessful){
                    val lojas = response.body()
                    lojas?.let {
                        listaLojas.clear()
                        listaLojas.addAll(it)
                        adapter.notifyDataSetChanged()
                    }
                } else {

                }
            }
            override fun onFailure(call: Call<List<Loja>>, t: Throwable) {
                Snackbar.make(binding.recyclerView, "Não foi possível carregar as lojas", Snackbar.LENGTH_LONG).show()
                Log.e("ListaLojasRvActivity", "carregarLojas", t)
            }
        }

        API().loja.listar().enqueue(callback)
        //API(this).produto.listar().enqueue(callback)
    }

    companion object {
        @JvmStatic
        fun newInstance() = LojasFragment()
    }
}