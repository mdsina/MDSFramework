<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">

    <xsl:output method="html"/>

    <xsl:template match="/">
        <xsl:apply-templates/>
    </xsl:template>

    <xsl:template match="data">
        <xsl:apply-templates/>
    </xsl:template>

    <xsl:template match="persons">
        <html>
            <body>
                <table border="1">
                    <xsl:for-each select="child::*">
                        <td>
                            <xsl:value-of select="."/>
                        </td>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>