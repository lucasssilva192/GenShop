package com.teyvat.genshop.menu.configuracoes

import android.os.Bundle
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.core.view.isVisible
import com.teyvat.genshop.R
import com.teyvat.genshop.databinding.FragmentEnderecosBinding
import com.teyvat.genshop.databinding.ItemEnderecoBinding

class EnderecosFragment : Fragment() {
    lateinit var binding: FragmentEnderecosBinding

    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?): View? {
        binding = FragmentEnderecosBinding.inflate(inflater)

        for (i in 1..10) {
            val itemBinding = ItemEnderecoBinding.inflate(layoutInflater)
            itemBinding.txtNomeEndereco.text = "Casa - ${i}"
            itemBinding.txtEndereco.text = "Av. Eng. Eusébio Stevaux, ${i} - Santo Amaro, São Paulo - SP, 04696-000"
            if(i != 7)
            {
                itemBinding.iconeAtivo.isVisible = false
            }
            binding.container.addView(itemBinding.root)
        }


        return binding.root
    }

    companion object {
        @JvmStatic
        fun newInstance() = EnderecosFragment()
    }
}