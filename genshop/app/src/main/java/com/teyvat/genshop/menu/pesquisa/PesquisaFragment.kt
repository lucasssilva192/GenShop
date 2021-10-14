package com.teyvat.genshop.menu.pesquisa

import android.os.Bundle
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import com.teyvat.genshop.R


class PesquisaFragment : Fragment() {
    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?): View? {
        return inflater.inflate(R.layout.fragment_pesquisa, container, false)
    }

    companion object {
        @JvmStatic
        fun newInstance() = PesquisaFragment()
    }


}