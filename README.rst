=================================
HexGridE - Online hex grid editor
=================================

How to use:
-----------

Simply put it somewhere under your www root where php files will be processed.
Then direct your browser to it and paint.

    * Painting and so is currently implemented using Canvas or SVG (you can choose which one to use).
    * First input your requested image dimensions (in hexagons) and click resize.
    * Then choose some color from palette and click to hexes in image.
    * After you finished you can save image in json (for future loading) or export it into SVG (with SVG implementation).

Sources are pretty raw at the moment (and I think they will stay such maybe forever).
There is simple config.php file with basic backend settings.
Pallete can be changed in src/palette.php. In the future there maybe will be support for palette switching.

At the moment IE is not supported (and never I personaly will never fix it until SVG/Canvas will work there with jQuery libs I use).

Other info:
-----------
Published under New BSD license.

You can report issues or get sources at github.com/queria
or look at sa-tas.net to see where I host my source codes in future.

Created by Queria Sa-Tas <public@sa-tas.net> 2011

There are few third-party parts of code included (jQuery for example)
and they can have other licensing conditions.
If you need to know, look into their source code or contact me to clarify it.

Copyright (c) 2011, Queria Sa-Tas <public@sa-tas.net>
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:

    * Redistributions of source code must retain the above copyright
      notice, this list of conditions and the following disclaimer.
    * Redistributions in binary form must reproduce the above copyright
      notice, this list of conditions and the following disclaimer in the
      documentation and/or other materials provided with the distribution.
    * Neither the name of the Queria Sa-Tas nor the
      names of its contributors may be used to endorse or promote products
      derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL QUERIA SA-TAS BE LIABLE FOR ANY
DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

